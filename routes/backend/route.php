<?php

use App\Http\Controllers\Backend\CoursesController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', [SiteController::class, 'index'])->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UserController::class)->group(function () {
        Route::get('/backend/user/index', 'index')->name('backend.user.index');
        Route::get('/backend/user/create', 'create')->name('backend.user.create');
        Route::get('/backend/user/{id}', 'show')->name('backend.user.show');
        Route::get('/backend/user/{id}/edit', 'edit')->name('backend.user.edit');
        Route::post('/backend/user/store', 'store')->name('backend.user.store');
        Route::put('/backend/user/{id}', 'update')->name('backend.user.update');
        Route::delete('/backend/user/{id}', 'destroy')->name('backend.user.destroy');
    });


    Route::controller(CoursesController::class)->group(function () {
        Route::get('/backend/courses/index', 'index')->name('backend.courses.index');
        Route::get('/backend/courses/create', 'create')->name('backend.courses.create');
        Route::get('/backend/courses/{id}', 'show')->name('backend.courses.show');
        Route::get('/backend/courses/{id}/edit', 'edit')->name('backend.courses.edit');
        Route::post('/backend/courses/store', 'store')->name('backend.courses.store');
        Route::put('/backend/courses/{id}', 'update')->name('backend.courses.update');
        Route::delete('/backend/courses/{id}', 'destroy')->name('backend.courses.destroy');
    });
});



Route::middleware(['auth', 'admin'])->controller(SliderController::class)->group(function () {
    Route::get('/slider/index', 'index')->name('slider.index');
    Route::get('/slider/create', 'create')->name('slider.create');
    Route::get('/slider/{id}', 'show')->name('slider.show');
    Route::get('/slider/{id}/edit', 'edit')->name('slider.edit');
    Route::post('/slider/store', 'store')->name('slider.store');
    Route::put('/slider/{id}', 'update')->name('slider.update');
    Route::delete('/slider/{id}', 'destroy')->name('slider.destroy');
});




Route::middleware(['auth', 'admin'])->controller(EventController::class)->group(function () {
    Route::get('/event/index', 'index')->name('event.index');
    Route::get('/event/create', 'create')->name('event.create');
    Route::get('/event/{id}', 'show')->name('event.show');
    Route::get('/event/{id}/edit', 'edit')->name('event.edit');
    Route::post('/event/store', 'store')->name('event.store');
    Route::put('/event/{id}', 'update')->name('event.update');
    Route::delete('/event/{id}', 'destroy')->name('event.destroy');
});


// Route::middleware(['auth', 'admin'])->controller(UserController::class)->group(function () {
//     Route::get('/user/index', 'index')->name('user.index');
//     Route::get('/user/create', 'create')->name('user.create');
//     Route::get('/user/{id}', 'show')->name('user.show');
//     Route::get('/user/{id}/edit', 'edit')->name('user.edit');
//     Route::post('/user/store', 'store')->name('user.store');
//     Route::put('/user/{id}', 'update')->name('user.update');
//     Route::delete('/user/{id}', 'destroy')->name('user.destroy');
// });
