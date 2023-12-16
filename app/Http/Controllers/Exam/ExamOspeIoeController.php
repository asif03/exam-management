<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamScheduleDetailsRequest;
use App\Http\Requests\ExamScheduleMasterRequest;
use App\Mail\OspeioeInvitation;
use App\Models\ExamHall;
use App\Models\ExamScheduleDetail;
use App\Models\ExamScheduleMaster;
use App\Models\ExamScheduleRole;
use App\Models\ExamType;
use App\Models\MotherSubject;
use App\Models\User;
use App\Sms\Sms;
use App\Traits\MenuTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Mail;
use PDF;

class ExamOspeIoeController extends Controller
{
    use MenuTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*public function menus()
    {
        $userModel = new User();
        $userModules = $userModel->getModules(auth()->id());

        foreach ($userModules as $usrmodule) {
            $assignModules[] = $usrmodule->module_id;
        }

        return $assignModules;
    }*/

    public function index()
    {
        return view('exam.schedules');
    }

    public function showOspeIoeMasterLandingPage()
    {
        $subjects = MotherSubject::where('active', true)->get();
        $examtype = ExamType::where('active', true)->get();
        $examhall = ExamHall::where('active', true)->get();

        $menus = $this->getMenuAccessByUser();

        return view('exam.ospeioe', [
            'menus'    => $menus,
            'subjects' => $subjects,
            'examtype' => $examtype,
            'examhall' => $examhall,
        ]);
    }

    public function getScheduleRolesData()
    {
        $query = "select id, position_name from exam_schedule_roles where active = 1";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function getSubjectWiseFellowData()
    {
        $subject_id = $_REQUEST['subject_id'];

        $query = "SELECT f.`id`, f.`fellowship_status_id`, f.`fellowship_year`, f.`fellowship_session`,
         f.`fellow_id`, f.`name`,f.`subject_id`, f.`office_add`, f.`mobile`, f.`e_mail`, f.`pnr_no`,
         f.`active`, s.`subject_name`
         FROM `fellows` f
         INNER JOIN subjects s ON s.`id` = f.`subject_id`
         WHERE `subject_id` IN (SELECT `subject_id` FROM `allied_subjects`
         WHERE `mother_subject_id` = $subject_id
         ORDER BY f.`id` DESC) ";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function getMasterSchedulFebyMotherSubjectData()
    {
        $subject_id = $_REQUEST['subject_id'];

        $query = "SELECT esm.`id`, et.`exam_type` AS `exam_type_id`, esm.`exam_date`, esm.`exam_start_time`,
            esm.`exam_end_time`, esm.`reporting_time`, eh.`hall_name` AS `hall_id`, ms.`subject_name`
            FROM `exam_schedule_masters` esm
            INNER JOIN `mother_subjects` ms ON ms.`id` = esm.`mother_subject_id`
            INNER JOIN `exam_types` et ON et.`id` = esm.`exam_type_id`
            INNER JOIN `exam_halls` eh ON eh.`id` = esm.`hall_id`
            WHERE esm.`active` = 1 AND esm.`mother_subject_id` = $subject_id
            ORDER BY esm.`id` DESC";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function saveScheduleMaster(ExamScheduleMasterRequest $request)
    {
        try {
            ExamScheduleMaster::create($request->all());
            return redirect()->back()->with('success', 'Data save successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOspeScheduleMasterData()
    {
        $query = "SELECT esm.`id`, et.`exam_type` AS `exam_type_id`, esm.`mother_subject_id`, esm.`exam_date`,
            esm.`exam_start_time`, esm.`exam_end_time`, esm.`reporting_time`,
            eh.`hall_name` AS `hall_id`, esm.`is_schedule_meeting`, esm.`active`, ms.`subject_name`,
            CASE WHEN esm.`is_schedule_meeting` = 1 THEN esm.`meeting_date`
                ELSE null END as meeting_date,
            CASE WHEN esm.`is_schedule_meeting` = 1 THEN esm.`meeting_time`
                ELSE null END as meeting_time
            FROM `exam_schedule_masters` esm
            INNER JOIN `mother_subjects` ms ON ms.`id` = esm.`mother_subject_id`
            INNER JOIN `exam_types` et ON et.`id` = esm.`exam_type_id`
            INNER JOIN `exam_halls` eh ON eh.`id` = esm.`hall_id`
            WHERE 1 ORDER BY esm.`id` DESC";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function getMasterSchedulebyMotherSubjectData()
    {
        $subject_id = $_REQUEST['subject_id'];

        $query = "SELECT esm.`id`, et.`exam_type` AS `exam_type_id`, esm.`exam_date`, esm.`exam_start_time`,
            esm.`exam_end_time`, esm.`reporting_time`, eh.`hall_name` AS `hall_id`, ms.`subject_name`
            FROM `exam_schedule_masters` esm
            INNER JOIN `mother_subjects` ms ON ms.`id` = esm.`mother_subject_id`
            INNER JOIN `exam_types` et ON et.`id` = esm.`exam_type_id`
            INNER JOIN `exam_halls` eh ON eh.`id` = esm.`hall_id`
            WHERE esm.`active` = 1 AND esm.`mother_subject_id` = $subject_id
            ORDER BY esm.`id` DESC";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function showOspeIoeSlaveLandingPage()
    {
        $menus = $this->menus();

        $subjects = MotherSubject::where('active', true)->get();
        $schedule_role = ExamScheduleRole::where('active', true)->get();

        return view('exam.ospeioeslavelanding', ['menus' => $menus,
            'subjects'                                       => $subjects, 'schedule_role' => $schedule_role]);
    }

    public function saveScheduleDetail(ExamScheduleDetailsRequest $request)
    {
        try {
            ExamScheduleDetail::create($request->all());
            return redirect()->back()->with('success', 'Data save successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function reports()
    {
        $menus = $this->menus();
        $examtype = ExamType::where('active', true)->get();
        $subjects = MotherSubject::where('active', true)->get();
        return view('exam.ospe-ioe-reports', ['menus' => $menus, 'examtype' => $examtype, 'subjects' => $subjects]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Convocation $id
     * @return \Illuminate\Http\Response
     */
    public function scheduleListView(Request $request)
    {
        $exam_type_id = $request->exam_type;
        $exam_year = $request->exam_year;
        $exam_session = $request->exam_session;
        $subject_id = $request->subject;

        $schedules = DB::table('exam_schedule_masters')
            ->where('exam_schedule_masters.exam_type_id', '=', $exam_type_id)
            ->where('exam_schedule_masters.exam_year', '=', $exam_year)
            ->where('exam_schedule_masters.exam_session', '=', $exam_session)
            ->where('exam_schedule_masters.mother_subject_id', '=', $subject_id)
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        //return view('exam.ospe-ioe-schedule-list', ['data' => $data]);
        return json_encode($schedules);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Convocation $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['id'] = $id;

        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_masters.id', '=', $id)
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.schedule_master_id', '=', $id)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $data['invigilators'] = $invigilators;

        return view('exam.schedule-view', ['data' => $data]);
        //return view('exam.schedule-view');
    }

    /**
     * Download the specified resource.
     *
     * @param \App\Models\ScheduleMaster $id
     * @return \Illuminate\Http\Response
     */
    public function downloadSchedule($id)
    {
        $data['id'] = $id;

        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_masters.id', '=', $id)
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.schedule_master_id', '=', $id)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.home_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $data['invigilators'] = $invigilators;

        $rptName = $scheduleInfo[0]->exam_type . '_' . $scheduleInfo[0]->subject_name . '_' . $scheduleInfo[0]->exam_date . ".pdf";
        $htm = "exam.ospe-ioe-schedule-pdf";
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }

    public function editDetailsSchedule($id)
    {
        $menus = $this->menus();
        $data['id'] = $id;

        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_masters.id', '=', $id)
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.schedule_master_id', '=', $id)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_details.role_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $data['invigilators'] = $invigilators;

        $data['invisilatorRoles'] = ExamScheduleRole::where('active', true)->get();

        return view('exam.edit-ospe-ioe-details', ['menus' => $menus, 'data' => $data]);
    }

    public function deleteInvisilator($id)
    {
        $invigilator = ExamScheduleDetail::find($id);
        $invigilator->delete();
        return redirect()->back()->with('success', 'Invisilator deleted successfully.');
    }

    public function updatePositionInvisilator($id)
    {
        $position_id = $_POST['invisilator_role_' . $id];

        $input = array(
            'role_id' => $position_id,
        );

        $invigilator = ExamScheduleDetail::find($id);
        $invigilator->update($input);
        return redirect()->back()->with('success', 'Invisilator position updated successfully.');
    }

    public function downloadInvisilatorInvitation($id)
    {
        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_details.id', '=', $id)
            ->join('exam_schedule_details', 'exam_schedule_masters.id', '=', 'exam_schedule_details.schedule_master_id')
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.id', '=', $id)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.home_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $data['invigilators'] = $invigilators;

        $rptName = $scheduleInfo[0]->exam_type . '_' . $scheduleInfo[0]->subject_name . '_' . $invigilators[0]->name . ".pdf";
        $htm = "exam.ospe-ioe-invitation-pdf";

        //return view($htm, $data);
        $pdf = PDF::loadView($htm, $data);

        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download($rptName);
    }

    public function editScheduleMaster($id)
    {
        $subjects = MotherSubject::where('active', true)->get();
        $examtype = ExamType::where('active', true)->get();
        $examhall = ExamHall::where('active', true)->get();

        $menus = $this->menus();
        return view('exam.edit_ospeioe', [
            'menus'      => $menus,
            'xmScMaster' => ExamScheduleMaster::findOrFail($id),
            'subjects'   => $subjects, 'examtype' => $examtype,
            'examhall'   => $examhall]
        );
    }

    public function updateScheduleMaster(ExamScheduleMasterRequest $request, $id)
    {
        try {
            $xmScmaster = ExamScheduleMaster::findOrFail($id);
            $xmScmaster->update($request->all());
            return redirect()->back()->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function emailInvisilatorInvitation($id, $invisilatorId)
    {
        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_details.id', '=', $invisilatorId)
            ->join('exam_schedule_details', 'exam_schedule_masters.id', '=', 'exam_schedule_details.schedule_master_id')
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.id', '=', $invisilatorId)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $data['invigilators'] = $invigilators;

        Mail::to($invigilators[0]->e_mail)->send(new OspeioeInvitation($data));

        if (count(Mail::failures()) > 0) {
            return redirect()->route('edit-ospe-ioe-details-schedule', ['id' => $id])->with('error', 'Email not send!');
        } else {
            return redirect()->route('edit-ospe-ioe-details-schedule', ['id' => $id])->with('success', 'Successfully Sent Email.');
        }
    }

    /**
     * email to all invisilator.
     *
     * @param \App\Models\ScheduleMaster $id
     * @return \Illuminate\Http\Response
     */
    public function emailInvitaionSchedule($id)
    {
        $scheduleInfo = DB::table('exam_schedule_masters')
            ->where('exam_schedule_masters.id', '=', $id)
            ->join('exam_types', 'exam_schedule_masters.exam_type_id', '=', 'exam_types.id')
            ->join('mother_subjects', 'exam_schedule_masters.mother_subject_id', '=', 'mother_subjects.id')
            ->join('exam_halls', 'exam_schedule_masters.hall_id', '=', 'exam_halls.id')
            ->join('exam_building_blocks', 'exam_building_blocks.id', '=', 'exam_halls.block_id')
            ->select('exam_schedule_masters.id', 'exam_types.exam_type', 'exam_schedule_masters.exam_session', 'exam_schedule_masters.exam_year', 'mother_subjects.subject_name',
                'exam_schedule_masters.exam_date', 'exam_schedule_masters.exam_start_time', 'exam_schedule_masters.meeting_date',
                'exam_schedule_masters.meeting_time', 'exam_building_blocks.block_name', 'exam_halls.hall_name')
            ->get();

        $data['schedule'] = $scheduleInfo[0];

        $invigilators = DB::table('exam_schedule_details')
            ->where('exam_schedule_details.schedule_master_id', '=', $id)
            ->join('fellows', 'exam_schedule_details.fellow_id', '=', 'fellows.id')
            ->join('exam_schedule_roles', 'exam_schedule_details.role_id', '=', 'exam_schedule_roles.id')
            ->select('exam_schedule_details.id', 'fellows.fellow_id', 'exam_schedule_roles.position_name', 'fellows.name',
                'fellows.office_add', 'fellows.mobile', 'fellows.e_mail', 'fellows.pnr_no')
            ->get();

        $recipients = array();
        foreach ($invigilators as $invigilator) {
            $recipients[] = $invigilator->e_mail;
        }

        $iLoop = 0;
        $cntEmailSentSuccess = 0;
        $cntEmailSentFailure = 0;

        foreach ($recipients as $recipient) {
            $collection = new Collection();
            $data['invigilators'] = $collection->push((object) $invigilators[$iLoop]);

            Mail::to($recipient)->send(new OspeioeInvitation($data));

            if (count(Mail::failures()) > 0) {
                $cntEmailSentFailure++;
            } else {
                $cntEmailSentSuccess++;
            }

            $iLoop++;
        }

        if ($cntEmailSentSuccess > 0 && $cntEmailSentFailure > 0) {
            return redirect()->route('edit-ospe-ioe-details-schedule', ['id' => $id])->with('success', 'Successfully Sent Email.');
        } elseif ($cntEmailSentSuccess == 0 && $cntEmailSentFailure > 0) {
            return redirect()->route('edit-ospe-ioe-details-schedule', ['id' => $id])->with('error', 'Failed to Sent Email.');
        } elseif ($cntEmailSentSuccess > 0 && $cntEmailSentFailure == 0) {
            return redirect()->route('edit-ospe-ioe-details-schedule', ['id' => $id])->with('success', 'Successfully Sent Email.');
        }
    }

    public function smsInvisilatorInvitation($id, $invisilatorId)
    {
        $smsSent = new Sms();
        //echo mb_convert_encoding('টেস্ট মেসেজ', 'UTF-16BE');
        //die;

        //dd($smsSent->send('01724296191', 'evsjv‡`k K‡jR Ae wdwRwkqvbm& GÛ mvR©bm& (wewmwcGm)-'));

    }

}