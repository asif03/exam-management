<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFellowRequest;
use App\Http\Requests\UpdateFellowRequest;
use App\Models\Fellow;
use App\Models\MotherSubject;
use App\Traits\MenuTrait;

class FellowController extends Controller
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
        $subjects = MotherSubject::where('active', true)->get();
        $fellows = Fellow::orderBy('fellow_id', 'asc')->get();

        return view('fellows.index', [
            'subjects' => $subjects,
            'fellows'  => $fellows,
            'menus'    => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFellowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFellowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function show(Fellow $fellow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function edit(Fellow $fellow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFellowRequest  $request
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFellowRequest $request, Fellow $fellow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fellow $fellow)
    {
        //
    }

    /**
     * Update or insert the specified resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function uploadFellows()
    {
        $menus = $this->getMenuAccessByUser();

        return view('fellows.upload-fellows', ['menus' => $menus]);
    }

}
