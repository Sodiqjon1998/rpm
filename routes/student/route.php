<?php

use App\Http\Controllers\Student\SiteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth.student', 'verified', 'student']], function () {

    Route::get('/student', [SiteController::class, 'index'])->name('student');
});
