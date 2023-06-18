<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlliedSubjectRequest;
use App\Models\AlliedSubject;
use App\Models\MotherSubject;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlliedSubjectController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menus();

        $motherSubjects = MotherSubject::where('active', '=', true)
            ->orderBy('subject_name', 'asc')->get();

        return view('allied-subject.index', ['subjects' => $motherSubjects, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->menus();

        $motherSubjects = MotherSubject::where('active', '=', true)
            ->orderBy('subject_name', 'asc')->get();

        $subjects = Subject::where('active', '=', true)
            ->orderBy('subject_name', 'asc')->get();

        return view('allied-subject.create', ['motherSubjects' => $motherSubjects, 'subjects' => $subjects, 'menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlliedSubjectRequest $request)
    {
        AlliedSubject::create($request->all());
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlliedSubject  $alliedSubject
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $alliedSubject = AlliedSubject::findOrFail($id);
        $alliedSubject->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully.');
    }

    public function viewAlliedSubjects(Request $request)
    {
        $motherSubjectId = $request->mother_subject_id;

        $alliedSubjects = DB::table('allied_subjects')
            ->where('allied_subjects.mother_subject_id', '=', $motherSubjectId)
            ->join('mother_subjects', 'allied_subjects.mother_subject_id', '=', 'mother_subjects.id')
            ->join('subjects', 'allied_subjects.subject_id', '=', 'subjects.id')
            ->select('allied_subjects.id', 'allied_subjects.mother_subject_id', 'allied_subjects.subject_id',
                'mother_subjects.subject_name as mother_subject_name', 'mother_subjects.sp_code as mother_sp_code',
                'subjects.subject_name', 'subjects.sp_code as subject_sp_code', 'allied_subjects.active')
            ->get();

        //return view('exam.ospe-ioe-schedule-list', ['data' => $data]);
        return json_encode($alliedSubjects);
    }
}