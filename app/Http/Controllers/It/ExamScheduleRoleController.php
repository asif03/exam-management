<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamScheduleRoleRequest;
use App\Http\Requests\UpdateExamScheduleRoleRequest;
use App\Models\ExamScheduleRole;
use App\Models\User;
use Illuminate\Http\Request;

class ExamScheduleRoleController extends Controller
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
        $roles = ExamScheduleRole::orderBy('position_name', 'asc')->get();

        return view('position.index', ['roles' => $roles, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->menus();

        return view('position.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamScheduleRoleRequest $request)
    {
        ExamScheduleRole::create($request->all());
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamScheduleRole  $examScheduleRole
     * @return \Illuminate\Http\Response
     */
    public function show(ExamScheduleRole $examScheduleRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamScheduleRole  $examScheduleRole
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamScheduleRole $examScheduleRole)
    {
        $menus = $this->menus();
        return view('position.edit', ['menus' => $menus, 'examScheduleRole' => $examScheduleRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamScheduleRole  $examScheduleRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamScheduleRoleRequest $request, ExamScheduleRole $examScheduleRole)
    {
        $examScheduleRole->update($request->all());
        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\ExamHall $examHall
     * @return \Illuminate\Http\Response
     */
    public function active(ExamScheduleRole $examScheduleRole)
    {
        $examScheduleRole->update(['active' => true]);
        return redirect()->back()->with('success', 'Position activated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\ExamHall $examHall
     * @return \Illuminate\Http\Response
     */
    public function inactive(ExamScheduleRole $examScheduleRole)
    {

        $examScheduleRole->update(['active' => false]);
        return redirect()->back()->with('success', 'Position deactivated successfully.');
    }
}