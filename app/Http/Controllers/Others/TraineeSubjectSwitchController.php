<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TraineeSubjectSwitch;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class TraineeSubjectSwitchController extends Controller
{
    public function menus()
    {
        $userModel = new User();
        $userModules = $userModel->getModules(auth()->id());

        foreach ($userModules as $usrmodule) {
            $assignModules[] = $usrmodule->module_id;
        }

        return $assignModules;
    }

    public function show()
    {
        $subjects = Subject::where('active', true)->get();
        $menus = $this->menus();
        return view('others.trainee-subject-switch', ['menus' => $menus, 'subjects' => $subjects]);
    }

    public function next(Request $request)
    {
        TraineeSubjectSwitch::create(array_merge($request->all()));

        $from_subject_id = Subject::where('id', $request->from_subject_id)->pluck('subject_name')->all();
        $data['from_subject_id'] = $from_subject_id[0];
        $to_subject_id = Subject::where('id', $request->to_subject_id)->pluck('subject_name')->all();
        $data['to_subject_id'] = $to_subject_id[0];

        $data['ref_no'] = $request->ref_no;
        $data['ref_date'] = date_format(date_create($request->ref_date), "d-m-Y");
        $data['gender'] = $request->gender === 'M' ? 'He' : 'She';
        $data['degree_type'] = strtoupper($request->degree_type);
        $data['candidate_name'] = ucwords($request->candidate_name);
        $data['registration_no'] = $request->registration_no;

        $rptName = time() . "trainee-subject-switch.pdf";
        $htm = "others.trainee-subject-switch-pdf";
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }
}