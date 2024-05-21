<?php

use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\SiteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth.student', 'verified', 'student']], function () {

    Route::get('/student', [SiteController::class, 'index'])->name('student');

    Route::prefix('student')->controller(SiteController::class)->group(function () {
        Route::get('/groups', 'groups')->name('groups');
    });

    Route::prefix('student')->controller(ExamController::class)->group(function () {
        Route::get('/exam/index', 'index')->name('exam.index');
        Route::get('/exam/show/{id}', 'show')->name('exam.show');


        Route::post('/exam/submit-exam', 'submitExam')->name('submitExam');
        Route::get('/exam/thank-you/{id}/attempt/{attempt_id}', 'thankYou')->name('thank-you');
    });
});
