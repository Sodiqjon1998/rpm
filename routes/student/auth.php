<?php

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Student\AuthenticatedSessionController;
use App\Http\Controllers\Student\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('student/login', [LoginController::class, 'create'])
        ->name('student.login.con');

    Route::post('student/login', [AuthenticatedSessionController::class, 'store'])->name('student.login');
});

Route::middleware('auth')->group(function () {

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('student/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('student.logout');
});
