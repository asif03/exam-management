<?php

use App\Http\Controllers\Exam\ExamDashboardController;
use App\Http\Controllers\Exam\ExamInfoUpdateController;
use App\Http\Controllers\Exam\ExamOspeIoeController;
use Illuminate\Support\Facades\Route;

Route::get('/exam-dashboard', [ExamDashboardController::class, 'index'])->middleware('auth')->name('exam-dashboard');

Route::get('/exam-info-update', [ExamInfoUpdateController::class, 'create'])->name('exam-info-update');
Route::post('/exam-info-save', [ExamInfoUpdateController::class, 'store'])->name('exam-info-save');
Route::get('/exam-info-update-file', [ExamInfoUpdateController::class, 'examInfoUpdateFileExport'])->name('exam-info-update-file');

//initialize
Route::get('/list-exam-info-update', [ExamInfoUpdateController::class, 'show'])->middleware(['auth'])->name('list-exam-info-update');
Route::get('/edit-exam-info-update/{id}', [ExamInfoUpdateController::class, 'edit'])->middleware(['auth'])->name('edit-exam-info-update');
Route::get('/exam-info-data', [ExamInfoUpdateController::class, 'getExamUpdateData'])->name('exam-info-data');
Route::get('/exam-info-delete/{id}', [ExamInfoUpdateController::class, 'deleteData'])->middleware(['auth'])->name('exam-info-delete');

//ospe-ioe
Route::prefix('exam')->group(function () {
    Route::get('/schedules', [ExamOspeIoeController::class, 'index'])->name('schedules');
    Route::get('/show-ospeioe', [ExamOspeIoeController::class, 'showOspeIoeMasterLandingPage'])->name('show-ospeioe');
    Route::post('/next-ospeioe', [ExamOspeIoeController::class, 'saveScheduleMaster'])->name('next-ospeioe');
    Route::get('/fellow-by-subject', [ExamOspeIoeController::class, 'getSubjectWiseFellowData'])->name('fellow-by-subject');
    Route::get('/get-sche-master', [ExamOspeIoeController::class, 'getOspeScheduleMasterData'])->name('get-sche-master');
    Route::get('/landing-details', [ExamOspeIoeController::class, 'showOspeIoeSlaveLandingPage'])->name('landing-details');
    Route::get('/get-mastersch-mother-sub', [ExamOspeIoeController::class, 'getMasterSchedulebyMotherSubjectData'])->name('get-mastersch-mother-sub');
    Route::post('/save-sch-detail', [ExamOspeIoeController::class, 'saveScheduleDetail'])->name('save-sch-detail');
    Route::get('/ospeioe/getschsduleroles', [ExamOspeIoeController::class, 'getScheduleRolesData'])->name('getschsduleroles');
    Route::get('/edit-ospe-ioe-details-schedule/{id}', [ExamOspeIoeController::class, 'editDetailsSchedule'])->name('edit-ospe-ioe-details-schedule');
    Route::delete('/delete-invisilator/{id}', [ExamOspeIoeController::class, 'deleteInvisilator'])->name('delete-invisilator');
    Route::put('/update-invisilator/{id}', [ExamOspeIoeController::class, 'updatePositionInvisilator'])->name('update-invisilator');

    Route::get('/ospeioe-reports', [ExamOspeIoeController::class, 'reports'])->name('ospeioe-reports');
    Route::post('/view-ospeioe-list', [ExamOspeIoeController::class, 'scheduleListView'])->name('view-ospeioe-list');
    Route::get('/view-schedule/{id}', [ExamOspeIoeController::class, 'show'])->name('view-schedule');
    Route::get('/schedule-download/{id}', [ExamOspeIoeController::class, 'downloadSchedule'])->name('schedule-download');
    Route::get('/download-invisilator-invitation/{id}', [ExamOspeIoeController::class, 'downloadInvisilatorInvitation'])->name('download-invisilator-invitation');
    Route::get('/email-invisilator-invitation/{id}/{invId}', [ExamOspeIoeController::class, 'emailInvisilatorInvitation'])->name('email-invisilator-invitation');
    Route::get('/schedule-email-all/{id}', [ExamOspeIoeController::class, 'emailInvitaionSchedule'])->name('schedule-email-all');

    Route::get('/schedule-sms-all/{id}', [ExamOspeIoeController::class, 'smsInvitaionSchedule'])->name('schedule-sms-all');
    Route::get('/sms-invisilator-invitation/{id}/{invId}', [ExamOspeIoeController::class, 'smsInvisilatorInvitation'])->name('sms-invisilator-invitation');

    Route::get('/edit-schedule-master/{id}', [ExamOspeIoeController::class, 'editScheduleMaster'])->name('edit-schedule-master');
    Route::put('/update-schedule-master/{id}', [ExamOspeIoeController::class, 'updateScheduleMaster'])->name('update-schedule-master');

    Route::get('/delete-schedule-master/{id}', [ExamOspeIoeController::class, 'deleteScheduleMaster'])->name('delete-schedule-master');

});
