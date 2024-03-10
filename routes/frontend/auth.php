<?php

use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('frontend/register', [SiteController::class, 'register'])
        ->name('frontend.register');

    Route::get('frontend/login', [SiteController::class, 'login'])
        ->name('frontend.login');

    Route::post('frontend/enter', [SiteController::class, 'enter'])
        ->name('frontend.enter');

    Route::post('frontend/store', [SiteController::class, 'store'])
        ->name('frontend.store');
});

Route::middleware('auth')->group(function () {
    Route::post('frontend/destroy', [SiteController::class, 'destroy'])
        ->name('frontend.destroy');
});
