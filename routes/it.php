<?php

use App\Http\Controllers\It\AlliedSubjectController;
use App\Http\Controllers\It\ExamHallController;
use App\Http\Controllers\It\ExamScheduleRoleController;
use App\Http\Controllers\It\ExamTypeController;
use App\Http\Controllers\It\ItDashboardControllr;
use App\Http\Controllers\It\MotherSubjectController;
use App\Http\Controllers\It\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/it-dashboard', [ItDashboardControllr::class, 'index'])->middleware('auth')->name('it-dashboard');

//Exam Types
Route::resource('examtypes', ExamTypeController::class)->middleware(['auth']);
Route::put('/examtypes/{examtype}/inactive', [ExamTypeController::class, 'inactive'])->middleware(['auth'])->name('examtypes.inactive');
Route::put('/examtypes/{examtype}/active', [ExamTypeController::class, 'active'])->middleware(['auth'])->name('examtypes.active');

//Mother Subject
Route::resource('mothersubjects', MotherSubjectController::class)->middleware(['auth']);
Route::put('/mothersubjects/{mothersubject}/inactive', [MotherSubjectController::class, 'inactive'])->middleware(['auth'])->name('mothersubject.inactive');
Route::put('/mothersubjects/{mothersubject}/active', [MotherSubjectController::class, 'active'])->middleware(['auth'])->name('mothersubject.active');

//Subject
Route::resource('subjects', SubjectController::class)->middleware(['auth']);
Route::put('/subject/{subject}/inactive', [SubjectController::class, 'inactive'])->middleware(['auth'])->name('subject.inactive');
Route::put('/subject/{subject}/active', [SubjectController::class, 'active'])->middleware(['auth'])->name('subject.active');

//Allied Subjects
Route::resource('allied-subjects', AlliedSubjectController::class)->middleware(['auth']);
Route::post('/view-allied-subjects', [AlliedSubjectController::class, 'viewAlliedSubjects'])->name('view-allied-subjects');
Route::get('/allied-subjects-delete/{id}', [AlliedSubjectController::class, 'delete'])->name('allied-subjects-delete');

//Exam Hall
Route::resource('exam-halls', ExamHallController::class)->middleware(['auth']);
Route::put('/exam-hall/{exam-hall}/inactive', [ExamHallController::class, 'inactive'])->middleware(['auth'])->name('exam-hall.inactive');
Route::put('/exam-hall/{exam-hall}/active', [ExamHallController::class, 'active'])->middleware(['auth'])->name('exam-hall.active');

//Exam Schedule Position
Route::resource('exam-schedule-roles', ExamScheduleRoleController::class)->middleware(['auth']);
Route::put('/exam-schedule-role/{exam-schedule-role}/inactive', [ExamScheduleRoleController::class, 'inactive'])->middleware(['auth'])->name('exam-schedule-role.inactive');
Route::put('/exam-schedule-role/{exam-schedule-role}/active', [ExamScheduleRoleController::class, 'active'])->middleware(['auth'])->name('exam-schedule-role.active');
