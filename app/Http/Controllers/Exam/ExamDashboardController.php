<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\User;

class ExamDashboardController extends Controller
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
        return view('exam.dashboard', ['menus' => $menus]);

    }
}
