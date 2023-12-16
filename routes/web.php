<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    require __DIR__ . '/admin.php';
    require __DIR__ . '/it.php';
    require __DIR__ . '/exam.php';
    require __DIR__ . '/rtm.php';
    require __DIR__ . '/others.php';
});

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
