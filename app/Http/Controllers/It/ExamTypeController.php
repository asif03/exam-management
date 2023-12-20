<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Traits\MenuTrait;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    use MenuTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->getMenuAccessByUser();
        $examTypes = ExamType::orderBy('exam_type', 'asc')->get();

        return view('exam-types.index', ['examTypes' => $examTypes, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->getMenuAccessByUser();
        return view('exam-types.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ExamType::create($request->all());
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examType = ExamType::find($id);
        $menus = $this->getMenuAccessByUser();
        return view('exam-types.edit', ['menus' => $menus, 'examType' => $examType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->update($request->all());

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function active(ExamType $examType, $id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->update(['active' => true]);
        return redirect()->back()->with('success', 'Exam Type activated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function inactive(ExamType $examType, $id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->update(['active' => false]);
        return redirect()->back()->with('success', 'Exam Type deleted successfully.');
    }
}
