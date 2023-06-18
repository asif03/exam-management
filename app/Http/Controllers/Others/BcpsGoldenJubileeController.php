<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Http\Requests\BcpsGoldenJubileeGuestRequest;
use App\Models\BcpsGoldenJubileeGuest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BcpsGoldenJubileeExport;
use PDF;

class BcpsGoldenJubileeController extends Controller
{

    public function index()
    {
        return view('others.index');
    }

    public function create()
    {
        $subjects = Subject::where('active', true)->get();
        return view('others.goldenjubileeform', [
            'subjects' => $subjects]);
    }
    
    public function create_backdated()
    {
        $subjects = Subject::where('active', true)->get();
        return view('others.goldenjubileeform_backdated', [
            'subjects' => $subjects]);
    }

    public function store(BcpsGoldenJubileeGuestRequest $request)
    {
        //dd($request->is_spouse_chk);
        if ($request->is_spouse_chk == null) {
            $is_spouse = 0;
        } else if ($request->is_spouse_chk == "on") {
            $is_spouse = 1;
        }

        $query = "SELECT id, mem_fellow_radio, fellow_id FROM bcps_golden_jubilee_guests
        WHERE mem_fellow_radio = '" . $request->mem_fellow_radio . "' AND fellow_id = '" . $request->fellow_id . "'";

        $queryList = DB::select($query);
        if (count($queryList) > 0) {
            return redirect()->back()->with('error', 'This Fellow/Member already registered.');
        }

        if ($request->file()) {
            $moneyRecFileName = time() . '_' . $request->fellow_id . '_' . $request->file('money_rec_file')->getClientOriginalName();
            $moneyRecFilePath = $request->file('money_rec_file')->storeAs('uploads/jubilee', $moneyRecFileName, 'public');

            $imgUpFileName = ($request->file('img_up_file') != null) ? time() . '_' . $request->fellow_id . '_' . $request->file('img_up_file')->getClientOriginalName() : " ";
            $imgUpFilePath = ($request->file('img_up_file') != null) ? $request->file('img_up_file')->storeAs('uploads/jubilee', $imgUpFileName, 'public') : " ";
        }

        $file_id = DB::table('bcps_golden_jubilee_guests')->insertGetId([
            "mem_fellow_radio" => $request->mem_fellow_radio,
            "fellow_id" => $request->fellow_id,
            "subject_id" => $request->subject_id,
            "profession" => $request->profession,
            "gender" => $request->gender,
            "candidate_name" => $request->candidate_name,
            "institute" => $request->institute,
            "department" => $request->department,
            "mailing_addr" => $request->mailing_addr,
            "mobile" => $request->mobile,
            "email" => $request->email,
            "is_spouse_chk" => $is_spouse,
            "spouse_name" => $request->spouse_name,
            "spouse_mobile" => $request->spouse_mobile,
            "reg_fee" => $request->reg_fee,
            "payment_mode" => $request->payment_mode,
            "bank_name" => $request->bank_name,
            "bank_branch" => $request->bank_branch,
            "money_receipt" => $request->money_receipt,
            "money_rec_file" => $moneyRecFilePath,
            "img_up_file" => $imgUpFilePath,
        ]);

        //BcpsGoldenJubileeGuest::create($request->all());
        return redirect()->back()->with('success', 'Data saved successfully.');
    }

    /*public function show()
    {
        return view('others.show');
    }*/

    function list() {
        
        $data['fellows'] = BcpsGoldenJubileeGuest::select(
            'bcps_golden_jubilee_guests.id',
            'bcps_golden_jubilee_guests.fellow_id',
            'bcps_golden_jubilee_guests.candidate_name',
            'bcps_golden_jubilee_guests.institute',
            'bcps_golden_jubilee_guests.department',
            'subjects.subject_name',
            'bcps_golden_jubilee_guests.reg_fee',
            'bcps_golden_jubilee_guests.spouse_name',
        )->where('mem_fellow_radio', 'fcps')
            ->leftJoin('subjects', 'subjects.id', '=', 'bcps_golden_jubilee_guests.subject_id')
            ->get();

        $data['members'] = BcpsGoldenJubileeGuest::select(
            'bcps_golden_jubilee_guests.id',
            'bcps_golden_jubilee_guests.fellow_id',
            'bcps_golden_jubilee_guests.candidate_name',
            'bcps_golden_jubilee_guests.institute',
            'bcps_golden_jubilee_guests.department',
            'subjects.subject_name',
            'bcps_golden_jubilee_guests.reg_fee',
            'bcps_golden_jubilee_guests.spouse_name',
        )->where('mem_fellow_radio', 'mcps')
            ->leftJoin('subjects', 'subjects.id', '=', 'bcps_golden_jubilee_guests.subject_id')
            ->get();
            
        //$data['fellows'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'fcps')->get();
        //$data['members'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'mcps')->get();
        return view('others.list', ['data' => $data]);
    }
    
    function listfellow() {
        $user_type = $_REQUEST['perticipant_type'];
        
        $data = BcpsGoldenJubileeGuest::where('mem_fellow_radio', $user_type)->get();
        return $data;
    }

    public function show_action_list()
    {
        return view('others.actionlist');
    }

    public function goldFileExport(Request $request)
    {
        return Excel::download(new BcpsGoldenJubileeExport(),  time() . '_' .'bcps_golden_jubilee_.xlsx');
    }
    
    public function stor_link()
    {
        //Artisan::call('storage:link');
        File::link(
            storage_path('app/public'), public_path('storage')
        );
        return 'Storage link created';
    }

    public function cacheclear_link(){
        $exitCode = Artisan::call('route:cache');
        return 'All routes cache has just been removed';
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
        $data['fellows'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'fcps')->orderBy('id', 'DESC')->get();
        $data['members'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'mcps')->orderBy('id', 'DESC')->get();
        return view('others.jubilee-applicant-list', ['data' => $data, 'menus' => $menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = BcpsGoldenJubileeGuest::findOrFail($id);

        $data['id'] = $applicant->id;
        $data['fellow_id'] = $applicant->fellow_id;
        $data['mem_fellow_radio'] = $applicant->mem_fellow_radio;

        $data['subject_id'] = $applicant->subject_id;
        $subject = Subject::where('id', $applicant->subject_id)->pluck('subject_name')->all();
        $data['subject_name'] = $subject[0];

        $data['profession'] = $applicant->profession;
        $data['gender'] = $applicant->gender;
        $data['candidate_name'] = $applicant->candidate_name;
        $data['institute'] = $applicant->institute;
        $data['department'] = $applicant->department;
        $data['mailing_addr'] = $applicant->mailing_addr;
        $data['mobile'] = $applicant->mobile;
        $data['email'] = $applicant->email;
        $data['is_spouse'] = $applicant->is_spouse_chk;
        $data['spouse_name'] = $applicant->spouse_name;
        $data['spouse_mobile'] = $applicant->spouse_mobile;
        $data['payment_mode'] = $applicant->payment_mode;
        $data['reg_fee'] = $applicant->reg_fee;
        $data['money_receipt_no'] = $applicant->money_receipt;
        $data['bank_name'] = $applicant->bank_name;
        $data['bank_branch'] = $applicant->bank_branch;
        $data['money_receipt'] = $applicant->money_rec_file;
        $data['picture'] = $applicant->img_up_file;
        $data['verified'] = $applicant->verified;

        return view('others.jubilee-view', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function imagedownload($id, $typ)
    {
        $applicant = BcpsGoldenJubileeGuest::findOrFail($id);

        $data['id'] = $applicant->id;
        $fellow_id = $applicant->fellow_id;
        $mem_fellow_radio = $applicant->mem_fellow_radio;
        $money_receipt = 'public/' . $applicant->money_rec_file;
        $picture = 'public/' . $applicant->img_up_file;

        if ($money_receipt != '' || $picture != '') {
            if ($typ == 'pic') {
                $ext = pathinfo($picture, PATHINFO_EXTENSION);
                $name = $mem_fellow_radio . '_' . $fellow_id . '_pic_jub' . '.' . $ext;
                $image = $picture;
            } elseif ($typ == 'money') {
                $ext = pathinfo($money_receipt, PATHINFO_EXTENSION);
                $name = $mem_fellow_radio . '_' . $fellow_id . '_money_jub' . '.' . $ext;
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function pictureView()
    {
        $menus = $this->menus();
        $data['fellows'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'fcps')
            ->orderBy('fellow_id', 'ASC')
            ->paginate(100);

        //dd($data['fellows']);
        //$data['members'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'mcps')->orderBy('id', 'DESC')->get();

        return view('others.jubilee-picture', ['data' => $data, 'menus' => $menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPictureList()
    {
        /*UPDATE `bcps_golden_jubilee_guests` t1
        INNER JOIN `bcps_golden_jubilee_guests` t2 ON t1.id = t2.id
        SET t1.orderby = t2.fellow_id
        WHERE t2.mem_fellow_radio = 'fcps'*/

        $data['fellows'] = BcpsGoldenJubileeGuest::where('mem_fellow_radio', 'fcps')
            ->orderBy('fellow_id', 'ASC')
            ->paginate(100);

        $rptName = "fellows_pic_list.pdf";
        $htm = "others.jubilee-picture-pdf";
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }
    
}