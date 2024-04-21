<?php

use App\Http\Controllers\Student\SiteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth.student', 'verified', 'student']], function () {

    Route::get('/student', [SiteController::class, 'index'])->name('student');

    Route::prefix('student')->controller(SiteController::class)->group(function () {
        Route::get('/groups', 'groups')->name('groups');
        Route::get('/exam', 'exam')->name('exam');

    });
});
