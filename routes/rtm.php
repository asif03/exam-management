<?php

use App\Http\Controllers\Rtm\RtmDashboardController;
use App\Http\Controllers\Rtm\RtmdTrainingWorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/rtm-dashboard', [RtmDashboardController::class, 'index'])->middleware('auth')->name('rtm-dashboard');

/* BCPS RTMD Training & Workshop */
Route::get('/rtmd-training-workshop', [RtmdTrainingWorkshopController::class, 'index'])->name('rtmd-training-workshop');
/*Route::get('/rtmd-apply-workshop', [RtmdTrainingWorkshopController::class, 'create'])->name('rtmd-apply-workshop');*/
Route::post('/rtmd-save-workshop', [RtmdTrainingWorkshopController::class, 'store'])->name('rtmd-save-workshop');
Route::get('/rtmd-workshop-applicant-list', [RtmdTrainingWorkshopController::class, 'show'])->name('rtmd-workshop-applicant-list');

Route::get('/workshop-applicant-list', [RtmdTrainingWorkshopController::class, 'applicantlist'])->middleware('auth')->name('workshop-applicant-list');
Route::get('/applicantview/{id}', [RtmdTrainingWorkshopController::class, 'applicantview'])->name('applicant-view');
Route::post('/download-list-pdf', [RtmdTrainingWorkshopController::class, 'downloadApplicantListPDF'])->name('download-list-pdf');
Route::post('/download-list-excel', [RtmdTrainingWorkshopController::class, 'downloadApplicantListExcel'])->name('download-list-excel');