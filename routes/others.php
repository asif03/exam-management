<?php

use App\Http\Controllers\Others\BcpsGoldenJubileeController;
use App\Http\Controllers\Others\ConvocationController;
use App\Http\Controllers\Others\BriefingProgramController;
use App\Http\Controllers\Others\TraineeSubjectSwitchController;
use Illuminate\Support\Facades\Route;


/* BCPS Golden Jubilee */
Route::get('/golden-jubilee', [BcpsGoldenJubileeController::class, 'index'])->name('golden-jubilee');
Route::get('/golden-jubilee-list', [BcpsGoldenJubileeController::class, 'list'])->name('golden-jubilee-list');
Route::get('/jubilee-member-info', [BcpsGoldenJubileeController::class, 'show'])->name('jubilee-member-info');
Route::get('/bcps-golden-jubilee', [BcpsGoldenJubileeController::class, 'create'])->name('bcps-golden-jubilee');
Route::post('/bcps-golden-jubilee-store', [BcpsGoldenJubileeController::class, 'store'])->name('jubilee-store');

Route::middleware('auth')->group(function () {
    Route::get('/jubilee-applicant-list', [BcpsGoldenJubileeController::class, 'applicantlist'])->name('jubilee-applicant-list');
    Route::get('/jubileeguest/{id}', [BcpsGoldenJubileeController::class, 'show'])->name('jubilee-guest-show');
    Route::get('/jubilee-image-download/{id}/{typ}', [BcpsGoldenJubileeController::class, 'imagedownload'])->name('jubilee-image-download');
    Route::get('/jubilee-picture-view', [BcpsGoldenJubileeController::class, 'pictureView'])->name('jubilee-picture-view');
    Route::get('/jubilee-picture-pdf', [BcpsGoldenJubileeController::class, 'downloadPictureList'])->name('jubilee-picture-pdf');
    Route::get('/bcps-golden-jubilee-backdated', [BcpsGoldenJubileeController::class, 'create_backdated'])->name('bcps-golden-jubilee-backdated');

});

Route::get('/fellow-list', [BcpsGoldenJubileeController::class, 'listfellow'])->name('fellow-list');
Route::get('/action-list', [BcpsGoldenJubileeController::class, 'show_action_list'])->middleware(['auth'])->name('action-list');
Route::get('/gold-file', [BcpsGoldenJubileeController::class, 'goldFileExport'])->name('gold-file');


/* BCPS 14th Convocation */
Route::get('/bcpsconvocation', [ConvocationController::class, 'index'])->name('bcpsconvocation');
Route::get('/subject-by-type', [ConvocationController::class, 'getSubjectByDegreeType'])->name('subject-by-type');
Route::get('/convocation4teen', [ConvocationController::class, 'create'])->name('convocation4teen');
Route::post('/convocation4teen-save', [ConvocationController::class, 'store'])->name('conv-4teen-save');
Route::get('/convocation-list', [ConvocationController::class, 'list'])->name('convocation-list');
//Route::get('/bcps-convocation-pdf', [ConvocationController::class, 'index'])->name('bcps-convocation-pdf');
Route::middleware('auth')->group(function () {
    Route::get('/convocation-applicant-list', [ConvocationController::class, 'applicantlist'])->name('convocation-applicant-list');
    Route::get('/convocationguest/{id}', [ConvocationController::class, 'show'])->name('convocation-guest-show');
    Route::get('/convocation/{id}', [ConvocationController::class, 'download'])->name('bcps-convocation-pdf');
    Route::get('/convocation-image-download/{id}/{typ}', [ConvocationController::class, 'imagedownload'])->name('convocation-image-download');
    
    Route::get('/convocation-picture-view', [ConvocationController::class, 'pictureView'])->name('convocation-picture-view');
    Route::post('/convocation-picture-pdf', [ConvocationController::class, 'downloadPictureList'])->name('convocation-picture-pdf');
    Route::post('/convocation-image-view', [ConvocationController::class, 'pictureListView'])->name('convocation-image-view');
});

// Polash
Route::get('/show-trainee-sub-mig', [TraineeSubjectSwitchController::class, 'show'])->name('show-trainee-sub-mig');
Route::post('/next-trainee-sub-mig', [TraineeSubjectSwitchController::class, 'next'])->name('next-trainee-sub-mig');
//Route::get('/up', [BcpsGoldenJubileeController::class, 'up_link'])->name('up');
//Route::get('/dw', [BcpsGoldenJubileeController::class, 'down_link'])->name('dw');

// Artisan
Route::get('/link', [BcpsGoldenJubileeController::class, 'stor_link'])->name('link');
Route::get('/clear-route-cache', [BcpsGoldenJubileeController::class, 'cacheclear_link'])->name('clear-route-cache');

/* FCPS Part-I briefing program */
Route::get('/briefing-program', [BriefingProgramController::class, 'index'])->name('briefing-program');
Route::get('/form-briefing-program/{sess}', [BriefingProgramController::class, 'create'])->name('form-briefing-program');
//Route::post('/save-briefing-program', [BriefingProgramController::class, 'save'])->name('save-briefing-program');
Route::get('/briefing-program-list', [BriefingProgramController::class, 'list'])->name('briefing-program-list');
Route::get('/xl-brf-data', [BriefingProgramController::class, 'brfDataExport'])->name('xl-brf-data');