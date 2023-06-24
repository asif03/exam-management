<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallRequest;
use App\Models\ExamBuildingBlock;
use App\Models\ExamHall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamHallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $halls = DB::table('exam_halls')
            ->join('exam_building_blocks', 'exam_halls.block_id', '=', 'exam_building_blocks.id')
            ->orderby('active', 'DESC')
            ->select('exam_halls.*', 'exam_building_blocks.block_name')
            ->get();

        return view('hall.index', ['halls' => $halls, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->menus();
        $blocks = ExamBuildingBlock::where('active', true)->orderby('block_name', 'asc')->get();
        return view('hall.create', ['menus' => $menus, 'blocks' => $blocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HallRequest $request)
    {
        ExamHall::create($request->all());
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamHall  $examHall
     * @return \Illuminate\Http\Response
     */
    public function show(ExamHall $examHall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamHall  $examHall
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamHall $examHall)
    {
        $menus = $this->menus();
        $blocks = ExamBuildingBlock::where('active', true)->orderby('block_name', 'asc')->get();
        return view('hall.edit', ['menus' => $menus, 'blocks' => $blocks, 'examHall' => $examHall]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamHall  $examHall
     * @return \Illuminate\Http\Response
     */
    public function update(HallRequest $request, ExamHall $examHall)
    {
        $examHall->update($request->all());
        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamHall  $examHall
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamHall $examHall)
    {
        //
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\ExamHall $examHall
     * @return \Illuminate\Http\Response
     */
    public function active(ExamHall $examHall)
    {
        $examHall->update(['active' => true]);
        return redirect()->back()->with('success', 'Hall activated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\ExamHall $examHall
     * @return \Illuminate\Http\Response
     */
    public function inactive(ExamHall $examHall)
    {

        $examHall->update(['active' => false]);
        return redirect()->back()->with('success', 'Hall deleted successfully.');
    }
}
