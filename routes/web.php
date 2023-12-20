<?php

use App\Http\Controllers\UserController;
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

    //User Management
    Route::prefix('user-management')->group(function () {
        Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::put('/users/{user}/inactive', [UserController::class, 'inactive'])->name('user.inactive');
        Route::put('/users/{user}/active', [UserController::class, 'active'])->name('user.active');
    });
});

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
