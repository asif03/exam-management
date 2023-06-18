<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware('auth')->name('admin-dashboard');