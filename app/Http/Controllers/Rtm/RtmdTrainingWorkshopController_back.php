<?php

namespace App\Http\Controllers\Rtm;

use App\Http\Controllers\Controller;
use App\Http\Requests\RtmdTrainingWorkshopRequest;
use App\Models\Bank;
use App\Models\RtmdTrainingWorkshop;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RtmdTrainingWorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rtm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::where('active', true)->get();
        $banks = Bank::where('active', true)->get();
        return view('rtm.applicationform', [
            'subjects' => $subjects, 'banks' => $banks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RtmdTrainingWorkshopRequest $request)
    {
        $applicantCount = DB::table('rtmd_training_workshops')->where('active', '=', true)->count();

        if ($applicantCount > 40) {
            return redirect()->back()->with('error', 'Registration quota already filled up. Please try into next batch later.');
        }

        $query = "SELECT id, fellow_id FROM rtmd_training_workshops
                    WHERE fellow_id = '" . $request->fellow_id . "'";

        $queryList = DB::select($query);
        if (count($queryList) > 0) {
            return redirect()->back()->with('error', 'You have already applied..');
        }

        if ($request->file()) {
            $moneyRecFileName = time() . '_' . $request->fellow_id . '_' . $request->file('money_rec_file')->getClientOriginalName();
            $moneyRecFilePath = $request->file('money_rec_file')->storeAs('uploads/rtmd', $moneyRecFileName, 'public');
        }

        $file_id = DB::table('rtmd_training_workshops')->insertGetId([
            "fellow_id"      => $request->fellow_id,
            "subject_id"     => $request->subject_id,
            "candidate_name" => $request->candidate_name,
            "mobile"         => $request->mobile,
            "email"          => $request->email,
            "reg_fee"        => $request->reg_fee,
            "bank_name"      => $request->bank_name,
            "bank_branch"    => $request->bank_branch,
            "money_receipt"  => $request->money_receipt,
            "money_rec_file" => $moneyRecFilePath,
        ]);

        //BcpsGoldenJubileeGuest::create($request->all());
        return redirect()->back()->with('success', 'Data saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RtmdTrainingWorkshop  $rtmdTrainingWorkshop
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['fellows'] = RtmdTrainingWorkshop::select(
            'rtmd_training_workshops.id',
            'rtmd_training_workshops.fellow_id',
            'rtmd_training_workshops.candidate_name',
            'rtmd_training_workshops.institute',
            'rtmd_training_workshops.department',
            'subjects.subject_name',
            'rtmd_training_workshops.reg_fee',
            'rtmd_training_workshops.bank_name'
        )->where('rtmd_training_workshops.active', true)
            ->leftJoin('subjects', 'subjects.id', '=', 'rtmd_training_workshops.subject_id')
            ->get();

        return view('rtm.list', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RtmdTrainingWorkshop  $rtmdTrainingWorkshop
     * @return \Illuminate\Http\Response
     */
    public function edit(RtmdTrainingWorkshop $rtmdTrainingWorkshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtmdTrainingWorkshop  $rtmdTrainingWorkshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RtmdTrainingWorkshop $rtmdTrainingWorkshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RtmdTrainingWorkshop  $rtmdTrainingWorkshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(RtmdTrainingWorkshop $rtmdTrainingWorkshop)
    {
        //
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
        $data['fellows'] = RtmdTrainingWorkshop::where('active', true)->get();
        return view('rtm.workshop-applicant-list', ['data' => $data, 'menus' => $menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function applicantview($id)
    {
        $applicant = RtmdTrainingWorkshop::findOrFail($id);

        $data['id'] = $applicant->id;
        $data['fellow_id'] = $applicant->fellow_id;

        $data['subject_id'] = $applicant->subject_id;
        $subject = Subject::where('id', $applicant->subject_id)->pluck('subject_name')->all();
        $data['subject_name'] = $subject[0];

        $data['candidate_name'] = $applicant->candidate_name;
        $data['mobile'] = $applicant->mobile;
        $data['email'] = $applicant->email;
        $data['reg_fee'] = $applicant->reg_fee;
        $data['money_receipt_no'] = $applicant->money_receipt;
        $data['bank_name'] = $applicant->bank_name;
        $data['bank_branch'] = $applicant->bank_branch;
        $data['money_receipt'] = $applicant->money_rec_file;
        $data['verified'] = $applicant->verified;

        return view('rtm.applicant-view', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadApplicantListPDF()
    {
        /*UPDATE `bcps_golden_jubilee_guests` t1
        INNER JOIN `bcps_golden_jubilee_guests` t2 ON t1.id = t2.id
        SET t1.orderby = t2.fellow_id
        WHERE t2.mem_fellow_radio = 'fcps'*/

        $data['fellows'] = RtmdTrainingWorkshop::where('active', true)
            ->orderBy('fellow_id', 'ASC')
            ->paginate(100);

        $rptName = "fellows_list.pdf";
        $htm = "rtm.applicant-list-pdf";

        //return view($htm, $data);
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }
}