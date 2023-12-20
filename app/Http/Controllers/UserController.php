<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\MenuTrait;

class UserController extends Controller
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
        $users = User::orderBy('name', 'asc')->get();

        return view('user.index', ['users' => $users, 'menus' => $menus]);
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function active(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['active' => true]);
        return redirect()->back()->with('success', 'User activated successfully.');
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function inactive(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['active' => false]);
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

}
