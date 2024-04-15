<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\GroupItemsController;
use App\Http\Controllers\Teacher\GroupsController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\QuestionItemController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\SiteController;
use App\Http\Controllers\Teacher\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth.teacher', 'verified', 'teacher']], function () {

    Route::get('/teacher', [SiteController::class, 'index'])->name('teacher');

    Route::prefix('teacher')->controller(UserController::class)->group(function () {
        Route::get('/teacher/user/index', 'index')->name('teacher.user.index');
        Route::get('/teacher/user/create', 'create')->name('teacher.user.create');
        Route::get('/teacher/user/{id}', 'show')->name('teacher.user.show');
        Route::get('/teacher/user/{id}/edit', 'edit')->name('teacher.user.edit');
        Route::post('/teacher/user/store', 'store')->name('teacher.user.store');
        Route::put('/teacher/user/{id}', 'update')->name('teacher.user.update');
        Route::delete('/teacher/user/{id}', 'destroy')->name('teacher.user.destroy');
    });

    Route::prefix('teacher')->controller(GroupsController::class)->group(function () {
        Route::get('/teacher/groups/index', 'index')->name('teacher.groups.index');
        Route::get('/teacher/groups/create', 'create')->name('teacher.groups.create');
        Route::get('/teacher/groups/{id}', 'show')->name('teacher.groups.show');
        Route::get('/teacher/groups/{id}/edit', 'edit')->name('teacher.groups.edit');
        Route::post('/teacher/groups/store', 'store')->name('teacher.groups.store');
        Route::put('/teacher/groups/{id}', 'update')->name('teacher.groups.update');
        Route::delete('/teacher/groups/{id}', 'destroy')->name('teacher.groups.destroy');

        Route::post('/teacher/groups/multiple', 'multiple')->name('teacher.groups.multiple');
        Route::get('/teacher/groups/{id}/removeStudent', 'removeStudent')->name('teacher.groups.removeStudent');
    });

    Route::prefix('teacher')->controller(GroupItemsController::class)->group(function () {
        Route::get('/teacher/groupitems/index', 'index')->name('teacher.groupitems.index');
        Route::get('/teacher/groupitems/create', 'create')->name('teacher.groupitems.create');
        Route::get('/teacher/groupitems/{id}', 'show')->name('teacher.groupitems.show');
        Route::get('/teacher/groupitems/{id}/edit', 'edit')->name('teacher.groupitems.edit');
        Route::post('/teacher/groupitems/store', 'store')->name('teacher.groupitems.store');
        Route::put('/teacher/groupitems/{id}', 'update')->name('teacher.groupitems.update');
        Route::delete('/teacher/groupitems/{id}', 'destroy')->name('teacher.groupitems.destroy');
    });


    Route::prefix('teacher')->controller(QuizController::class)->group(function () {
        Route::get('/teacher/quiz/index', 'index')->name('teacher.quiz.index');
        Route::get('/teacher/quiz/create', 'create')->name('teacher.quiz.create');
        Route::get('/teacher/quiz/{id}', 'show')->name('teacher.quiz.show');
        Route::get('/teacher/quiz/{id}/edit', 'edit')->name('teacher.quiz.edit');
        Route::post('/teacher/quiz/store', 'store')->name('teacher.quiz.store');
        Route::put('/teacher/quiz/{id}', 'update')->name('teacher.quiz.update');
        Route::delete('/teacher/quiz/{id}', 'destroy')->name('teacher.quiz.destroy');
    });

    Route::prefix('teacher')->controller(QuestionController::class)->group(function () {
        Route::get('/teacher/question/index/{id}', 'index')->name('teacher.question.index');
        Route::get('/teacher/question/create', 'create')->name('teacher.question.create');
        Route::get('/teacher/question/{id}', 'show')->name('teacher.question.show');
        Route::get('/teacher/question/{id}/edit', 'edit')->name('teacher.question.edit');
        Route::post('/teacher/question/store', 'store')->name('teacher.question.store');
        Route::put('/teacher/question', 'update')->name('teacher.question.update');
        Route::delete('/teacher/question/{id}', 'destroy')->name('teacher.question.destroy');

        Route::get('/teacher/question/getData/{id}', 'getData')->name('teacher.question.getData');
    });


    Route::prefix('teacher')->controller(QuestionItemController::class)->group(function () {
        Route::get('/teacher/questionItems/index', 'index')->name('teacher.questionItems.index');
        Route::get('/teacher/questionItems/create', 'create')->name('teacher.questionItems.create');
        Route::get('/teacher/questionItems/{id}', 'show')->name('teacher.questionItems.show');
        Route::get('/teacher/questionItems/{id}/edit', 'edit')->name('teacher.questionItems.edit');
        Route::post('/teacher/questionItems/store', 'store')->name('teacher.questionItems.store');
        Route::put('/teacher/questionItems', 'update')->name('teacher.questionItems.update');
        Route::delete('/teacher/questionItems/{id}', 'destroyQuestion')->name('teacher.questionItems.destroyQuestion');
        Route::get('/teacher/questionItems', 'destroy')->name('teacher.questionItems.destroy');

        Route::get('/teacher/questionItems/getData/{id}', 'getData')->name('teacher.questionItems.getData');
        Route::post('/teacher/questionItems/import', 'import')->name('teacher.questionItems.import');
    });
});
