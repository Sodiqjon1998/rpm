<?php

use App\Http\Controllers\Backend\CoursesController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', [SiteController::class, 'index'])->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->controller(UserController::class)->group(function () {
        Route::get('/backend/user/index', 'index')->name('backend.user.index');
        Route::get('/backend/user/students', 'students')->name('backend.user.students');
        Route::get('/backend/user/create', 'create')->name('backend.user.create');
        Route::get('/backend/user/{id}', 'show')->name('backend.user.show');
        Route::get('/backend/user/{id}/edit', 'edit')->name('backend.user.edit');
        Route::post('/backend/user/store', 'store')->name('backend.user.store');
        Route::put('/backend/user/{id}', 'update')->name('backend.user.update');
        Route::delete('/backend/user/{id}', 'destroy')->name('backend.user.destroy');

        Route::get('/backend/user/{id}/groups', 'groups')->name('backend.user.groups');
        Route::get('/backend/user/{id}/pupils', 'pupils')->name('backend.user.pupils');
        Route::get('/backend/user/{id}/finished', 'finished')->name('backend.user.finished');
    });


    Route::prefix('/dashboard')->controller(CoursesController::class)->group(function () {
        Route::get('/backend/courses/index', 'index')->name('backend.courses.index');
        Route::get('/backend/courses/create', 'create')->name('backend.courses.create');
        Route::get('/backend/courses/{id}', 'show')->name('backend.courses.show');
        Route::get('/backend/courses/{id}/edit', 'edit')->name('backend.courses.edit');
        Route::post('/backend/courses/store', 'store')->name('backend.courses.store');
        Route::put('/backend/courses/{id}', 'update')->name('backend.courses.update');
        Route::delete('/backend/courses/{id}', 'destroy')->name('backend.courses.destroy');
    });
});

