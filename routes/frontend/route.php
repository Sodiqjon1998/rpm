<?php

use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function(){
    Route::get('/frontend/user/index', 'index')->name('frontend.user.index');
});