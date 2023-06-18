<?php

namespace App\Http\Controllers\Others;

use App\Exports\BriefingProgramExport;
use App\Http\Controllers\Controller;
use App\Models\BriefingProgram;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BriefingProgramController extends Controller
{
    public function index()
    {
        return view('others.briefing-program-index');
    }

    public function create($sess)
    {
        $subjects = Subject::where('active', true)->get();
        return view('others.briefingform22', [
            'subjects' => $subjects, 'sess' => $sess]);
    }

    public function save(Request $request)
    {
        try {
            $sess = $request->exam_session;
            $query = "SELECT id, exam_year, exam_session, mobile FROM briefing_programs
        WHERE mobile = '" . $request->mobile . "' AND exam_session = '" . $sess . "'";

            $queryList = DB::select($query);
            if (count($queryList) > 0) {
                return redirect()->back()->with('error', 'This Participant already registered.');
            }

            $file_id = DB::table('briefing_programs')->insertGetId([
                "subject_id"     => $request->subject_id,
                "candidate_name" => $request->candidate_name,
                "mailing_addr"   => $request->mailing_addr,
                "mobile"         => $request->mobile,
                "email"          => $request->email,
                "exam_year"      => '2022',
                "exam_session"   => $sess,
            ]);
            return redirect()->back()->with('success', 'Data saved successfully.');

        } catch (Exception $e) {
            return $e;
        }
    }

    function list() {

        $data['janCandidates'] = BriefingProgram::select(
            'briefing_programs.id',
            'briefing_programs.exam_year',
            'briefing_programs.exam_session',
            'briefing_programs.candidate_name',
            'briefing_programs.mailing_addr',
            'briefing_programs.mobile',
            'briefing_programs.email',
            'subjects.subject_name',
        )->where('exam_session', 'JAN')
            ->leftJoin('subjects', 'subjects.id', '=', 'briefing_programs.subject_id')
            ->get();

        $data['julCandidates'] = BriefingProgram::select(
            'briefing_programs.id',
            'briefing_programs.exam_year',
            'briefing_programs.exam_session',
            'briefing_programs.candidate_name',
            'briefing_programs.mailing_addr',
            'briefing_programs.mobile',
            'briefing_programs.email',
            'subjects.subject_name',
        )->where('exam_session', 'JUL')
            ->leftJoin('subjects', 'subjects.id', '=', 'briefing_programs.subject_id')
            ->get();

        return view('others.briefing-program-list', ['data' => $data]);
    }
    
    public function brfDataExport(Request $request)
    {
        return Excel::download(new BriefingProgramExport(), time() . '_' . 'briefing_program_export.xlsx');
    }
}