<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;

class ItDashboardControllr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('it.dashboard');
    }
}