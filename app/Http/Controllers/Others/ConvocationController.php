<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConvocationGuestRequest;
use App\Models\ConvocationGuest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ConvocationController extends Controller
{
    public function index()
    {
        return view('others.convocation-index');
    }

    public function getSubjectByDegreeType()
    {
        $degtype = $_REQUEST['degtype'];

        if ($degtype == 'FCPS') {
            $subjects = Subject::where('fcps_flg', 'Y')->get(['id', 'subject_name']);
        } elseif ($degtype == 'MCPS') {
            $subjects = Subject::where('mcps_flg', 'Y')->get(['id', 'subject_name']);
        }

        return $subjects;
    }

    public function create()
    {
        return view('others.convocationform');
    }

    public function store(ConvocationGuestRequest $request)
    {
        if ($request->is_spouse_chk == null) {
            $is_spouse = 0;
        } else if ($request->is_spouse_chk == "on") {
            $is_spouse = 1;
        }
        if ($request->is_origin_cert_rec == null) {
            $is_origin_cert_rec = 0;
        } else if ($request->is_origin_cert_rec == "on") {
            $is_origin_cert_rec = 1;
        }
        if ($request->is_prov_cert_rec == null) {
            $is_prov_cert_rec = 0;
        } else if ($request->is_prov_cert_rec == "on") {
            $is_prov_cert_rec = 1;
        }

        $query = "SELECT id, mem_fellow_radio, fellow_id FROM convocation_guests
        WHERE mem_fellow_radio = '" . $request->mem_fellow_radio . "' AND fellow_id = '" . $request->fellow_id . "'";

        $queryList = DB::select($query);
        if (count($queryList) > 0) {
            return redirect()->back()->with('error', 'This Fellow/Member already registered.');
        }

        if ($request->file()) {

            $moneyRecFileName = ($request->file('money_rec_file') != null) ? time() . '_mrf_' . $request->fellow_id . '_' . $request->file('money_rec_file')->getClientOriginalName() : " ";
            $moneyRecFilePath = ($request->file('money_rec_file') != null) ? $request->file('money_rec_file')->storeAs('uploads/convocation', $moneyRecFileName, 'public') : " ";

            $imgUpFileName = ($request->file('img_up_file') != null) ? time() . '_iuf_' . $request->fellow_id . '_' . $request->file('img_up_file')->getClientOriginalName() : " ";
            $imgUpFilePath = ($request->file('img_up_file') != null) ? $request->file('img_up_file')->storeAs('uploads/convocation', $imgUpFileName, 'public') : " ";
        }

        $id = DB::table('convocation_guests')->insertGetId([
            "mem_fellow_radio" => $request->mem_fellow_radio,
            "fellow_id" => $request->fellow_id,
            "subject_id" => $request->subject_id,
            "exam_year" => $request->exam_year,
            "exam_session" => $request->exam_session,
            "candidate_name" => $request->candidate_name,
            "father_name" => $request->father_name,
            "mailing_addr" => $request->mailing_addr,
            "mobile" => $request->mobile,
            "email" => $request->email,
            "is_spouse_chk" => $is_spouse,
            "is_origin_cert_rec" => $is_origin_cert_rec,
            "is_prov_cert_rec" => $is_prov_cert_rec,
            "spouse_name" => $request->spouse_name,
            "spouse_relation" => $request->spouse_relation,
            "payment_mode" => $request->payment_mode,
            "reg_fee" => $request->reg_fee,
            "money_receipt_no" => $request->money_receipt_no,
            "bank_name" => $request->bank_name,
            "bank_branch" => $request->bank_branch,
            "date_submission" => $request->date_submission,
            "money_rec_file" => $moneyRecFilePath,
            "img_up_file" => $imgUpFilePath,
        ]);

        $data = $request->all();
        $subject = Subject::where('id', $request->subject_id)->pluck('subject_name')->all();
        $data['subject_name'] = $subject[0];

        $data['is_spouse'] = $is_spouse;
        $data['is_origin_cert_rec'] = $is_origin_cert_rec;
        $data['is_prov_cert_rec'] = $is_prov_cert_rec;
        $data['money_receipt'] = $moneyRecFilePath;
        $data['picture'] = $imgUpFilePath;

        //dd($data);
        $rptName = "convocation.pdf";
        $htm = "others.convocation-pdf";
        $pdf = PDF::loadView($htm, $data);

        //return view('others.convocation-pdf', ['asif' => $data]);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }

    function list() {
        $data['fellows'] = ConvocationGuest::where('mem_fellow_radio', 'fcps')->get();
        $data['members'] = ConvocationGuest::where('mem_fellow_radio', 'mcps')->get();
        return view('others.convocation-list', ['data' => $data]);
    }
    
    /*----------Added For Admin Panel------------*/
    public function menus()
    {
        $userModel = new User();
        $userModules = $userModel->getModules(auth()->id());

        foreach ($userModules as $usrmodule) {
            $assignModules[] = $usrmodule->module_id;
        }

        return $assignModules;
    }

    public function applicantlist()
    {
        $menus = $this->menus();
        $data['fellows'] = ConvocationGuest::where('mem_fellow_radio', 'fcps')->get();
        $data['members'] = ConvocationGuest::where('mem_fellow_radio', 'mcps')->get();
        return view('others.convocation-applicant-list', ['data' => $data, 'menus' => $menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = ConvocationGuest::findOrFail($id);

        $data['id'] = $applicant->id;
        $data['fellow_id'] = $applicant->fellow_id;
        $data['mem_fellow_radio'] = $applicant->mem_fellow_radio;

        $data['subject_id'] = $applicant->subject_id;
        $subject = Subject::where('id', $applicant->subject_id)->pluck('subject_name')->all();
        $data['subject_name'] = $subject[0];

        $data['exam_year'] = $applicant->exam_year;
        $data['exam_session'] = $applicant->exam_session;
        $data['candidate_name'] = $applicant->candidate_name;
        $data['father_name'] = $applicant->father_name;
        $data['mailing_addr'] = $applicant->mailing_addr;
        $data['mobile'] = $applicant->mobile;
        $data['email'] = $applicant->email;
        $data['is_spouse'] = $applicant->is_spouse_chk;
        $data['is_origin_cert_rec'] = $applicant->is_origin_cert_rec;
        $data['is_prov_cert_rec'] = $applicant->is_prov_cert_rec;
        $data['spouse_name'] = $applicant->spouse_name;
        $data['spouse_relation'] = $applicant->spouse_relation;
        $data['payment_mode'] = $applicant->payment_mode;
        $data['reg_fee'] = $applicant->reg_fee;
        $data['money_receipt_no'] = $applicant->money_receipt_no;
        $data['bank_name'] = $applicant->bank_name;
        $data['bank_branch'] = $applicant->bank_branch;
        $data['date_submission'] = $applicant->date_submission;
        $data['money_receipt'] = $applicant->money_rec_file;
        $data['picture'] = $applicant->img_up_file;
        $data['verified'] = $applicant->verified;

        return view('others.convocation-view', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function imagedownload($id, $typ)
    {
        $applicant = ConvocationGuest::findOrFail($id);

        $data['id'] = $applicant->id;
        $fellow_id = $applicant->fellow_id;
        $mem_fellow_radio = $applicant->mem_fellow_radio;
        $money_receipt = 'public/' . $applicant->money_rec_file;
        $picture = 'public/' . $applicant->img_up_file;

        if ($money_receipt != '' || $picture != '') {
            if ($typ == 'pic') {
                $ext = pathinfo($picture, PATHINFO_EXTENSION);
                $name = $mem_fellow_radio . '_' . $fellow_id . '_pic_' . '.' . $ext;
                $image = $picture;
            } elseif ($typ == 'money') {
                $ext = pathinfo($money_receipt, PATHINFO_EXTENSION);
                $name = $mem_fellow_radio . '_' . $fellow_id . '_money_' . '.' . $ext;
                $image = $money_receipt;
            }

            $headers = array(
                'Content-Type: image/jpeg',
            );

            return Storage::download($image, $name, $headers);

        } else {
            return;
        }
    }

    public function download($id)
    {
        $applicant = ConvocationGuest::where('id', $id)->first();

        $data['id'] = $applicant->id;
        $data['fellow_id'] = $applicant->fellow_id;
        $data['mem_fellow_radio'] = $applicant->mem_fellow_radio;

        $data['subject_id'] = $applicant->subject_id;
        $subject = Subject::where('id', $applicant->subject_id)->pluck('subject_name')->all();
        $data['subject_name'] = $subject[0];

        $data['exam_year'] = $applicant->exam_year;
        $data['exam_session'] = $applicant->exam_session;
        $data['candidate_name'] = $applicant->candidate_name;
        $data['father_name'] = $applicant->father_name;
        $data['mailing_addr'] = $applicant->mailing_addr;
        $data['mobile'] = $applicant->mobile;
        $data['email'] = $applicant->email;
        $data['is_spouse'] = $applicant->is_spouse_chk;
        $data['is_origin_cert_rec'] = $applicant->is_origin_cert_rec;
        $data['is_prov_cert_rec'] = $applicant->is_prov_cert_rec;
        $data['spouse_name'] = $applicant->spouse_name;
        $data['spouse_relation'] = $applicant->spouse_relation;
        $data['payment_mode'] = $applicant->payment_mode;
        $data['reg_fee'] = $applicant->reg_fee;
        $data['money_receipt_no'] = $applicant->money_receipt_no;
        $data['bank_name'] = $applicant->bank_name;
        $data['bank_branch'] = $applicant->bank_branch;
        $data['date_submission'] = $applicant->date_submission;
        $data['money_receipt'] = $applicant->money_rec_file;
        $data['picture'] = $applicant->img_up_file;
        $data['verified'] = $applicant->verified;

        //dd($data);

        $rptName = $applicant->fellow_id . "_convocation.pdf";
        $htm = "others.convocation-pdf";
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function pictureView()
    {
        $menus = $this->menus();
        return view('others.convocation-picture', ['menus' => $menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function pictureListView(Request $request)
    {
        $data['fellow_type'] = $request->degree_type == 'fcps' ? 'FCPS' : 'MCPS';
        $data['session_type'] = $request->session == 'JAN' ? 'January' : 'July';
        $data['year'] = $request->year;

        $data['fellows'] = ConvocationGuest::select('*')
            ->where('mem_fellow_radio', '=', $request->degree_type)
            ->where('exam_year', '=', $request->year)
            ->where('exam_session', '=', $request->session)
            ->orderBy('fellow_id', 'ASC')
            ->get();

        return view('others.convocation-picture-list', ['data' => $data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPictureList(Request $request)
    {
        $data['fellow_type'] = $request->degree == 'fcps' ? 'FCPS' : 'MCPS';
        $data['session_type'] = $request->session == 'JAN' ? 'January' : 'July';
        $data['year'] = $request->year;

        $data['fellows'] = ConvocationGuest::select('*')
            ->where('mem_fellow_radio', '=', $request->degree)
            ->where('exam_year', '=', $request->year)
            ->where('exam_session', '=', $request->session)
            ->orderBy('fellow_id', 'ASC')
            ->get();

        $rptName = "convocation-picture-pdf.pdf";
        $htm = "others.convocation-picture-pdf";
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);

    }
}