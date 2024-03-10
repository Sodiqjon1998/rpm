<?php

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Teacher\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('teacher/login', [LoginController::class, 'create'])
        ->name('teacher.login.con');

    Route::post('teacher/login', [AuthenticatedSessionController::class, 'store'])->name('teacher.login');
});

Route::middleware('auth')->group(function () {

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('teacher/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('teacher.logout');
});
