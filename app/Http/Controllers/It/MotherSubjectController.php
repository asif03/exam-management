<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherSubjectRequest;
use App\Http\Requests\UpdateMotherSubjectRequest;
use App\Models\MotherSubject;
use App\Traits\MenuTrait;
use Illuminate\Http\Request;

class MotherSubjectController extends Controller
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
        $subjects = MotherSubject::orderBy('subject_name', 'asc')->get();

        return view('mother-subject.index', ['subjects' => $subjects, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->getMenuAccessByUser();
        return view('mother-subject.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotherSubjectRequest $request)
    {
        //dd($request->all());
        MotherSubject::create($request->all());
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MotherSubject  $motherSubject
     * @return \Illuminate\Http\Response
     */
    public function show(MotherSubject $motherSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MotherSubject  $motherSubject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motherSubject = MotherSubject::find($id);
        $menus = $this->getMenuAccessByUser();
        return view('mother-subject.edit', ['menus' => $menus, 'subject' => $motherSubject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MotherSubject  $motherSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMotherSubjectRequest $request, $id)
    {
        $motherSubject = MotherSubject::findOrFail($id);
        $motherSubject->update($request->all());

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MotherSubject  $motherSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(MotherSubject $motherSubject)
    {
        //
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function active(MotherSubject $subject, $id)
    {
        $motherSubject = MotherSubject::findOrFail($id);
        $motherSubject->update(['active' => true]);
        return redirect()->back()->with('success', 'Mother Subject activated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function inactive(MotherSubject $subject, $id)
    {
        $motherSubject = MotherSubject::findOrFail($id);
        $motherSubject->update(['active' => false]);
        return redirect()->back()->with('success', 'Mother Subject deleted successfully.');
    }
}
