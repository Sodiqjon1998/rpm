<?php

use App\Http\Controllers\Teacher\ExamsAttemptController;
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
        Route::get('/user/index', 'index')->name('teacher.user.index');
        Route::get('/user/create', 'create')->name('teacher.user.create');
        Route::get('/user/{id}', 'show')->name('teacher.user.show');
        Route::get('/user/{id}/edit', 'edit')->name('teacher.user.edit');
        Route::post('/user/store', 'store')->name('teacher.user.store');
        Route::put('/user/{id}', 'update')->name('teacher.user.update');
        Route::delete('/user/{id}', 'destroy')->name('teacher.user.destroy');
    });

    Route::prefix('teacher')->controller(GroupsController::class)->group(function () {
        Route::get('/groups/index', 'index')->name('teacher.groups.index');
        Route::get('/groups/create', 'create')->name('teacher.groups.create');
        Route::get('/groups/{id}', 'show')->name('teacher.groups.show');
        Route::get('/groups/{id}/edit', 'edit')->name('teacher.groups.edit');
        Route::post('/groups/store', 'store')->name('teacher.groups.store');
        Route::put('/groups/{id}', 'update')->name('teacher.groups.update');
        Route::delete('/groups/{id}', 'destroy')->name('teacher.groups.destroy');

        Route::post('/groups/multiple', 'multiple')->name('teacher.groups.multiple');
        Route::get('/groups/{id}/removeStudent', 'removeStudent')->name('teacher.groups.removeStudent');
    });

    Route::prefix('teacher')->controller(GroupItemsController::class)->group(function () {
        Route::get('/groupitems/index', 'index')->name('teacher.groupitems.index');
        Route::get('/groupitems/create', 'create')->name('teacher.groupitems.create');
        Route::get('/groupitems/{id}', 'show')->name('teacher.groupitems.show');
        Route::get('/groupitems/{id}/edit', 'edit')->name('teacher.groupitems.edit');
        Route::post('/groupitems/store', 'store')->name('teacher.groupitems.store');
        Route::put('/groupitems/{id}', 'update')->name('teacher.groupitems.update');
        Route::delete('/groupitems/{id}', 'destroy')->name('teacher.groupitems.destroy');
    });


    Route::prefix('teacher')->controller(QuizController::class)->group(function () {
        Route::get('/quiz/index', 'index')->name('teacher.quiz.index');
        Route::get('/quiz/create', 'create')->name('teacher.quiz.create');
        Route::get('/quiz/{id}', 'show')->name('teacher.quiz.show');
        Route::get('/quiz/{id}/edit', 'edit')->name('teacher.quiz.edit');
        Route::post('/quiz/store', 'store')->name('teacher.quiz.store');
        Route::put('/quiz/{id}', 'update')->name('teacher.quiz.update');
        Route::delete('/quiz/{id}', 'destroy')->name('teacher.quiz.destroy');
    });

    Route::prefix('teacher')->controller(QuestionController::class)->group(function () {
        Route::get('/question/index/{id}', 'index')->name('teacher.question.index');
        Route::get('/question/create', 'create')->name('teacher.question.create');
        Route::get('/question', 'show')->name('teacher.question.show');
        Route::get('/question/{id}/edit', 'edit')->name('teacher.question.edit');
        Route::post('/question/store', 'store')->name('teacher.question.store');
        Route::put('/question', 'update')->name('teacher.question.update');
        Route::delete('/question/{id}', 'destroy')->name('teacher.question.destroy');

        Route::get('/question/getData/{id}', 'getData')->name('teacher.question.getData');

        Route::get("/questionItems/getQuestionItems", 'getQuestionItems')->name('teacher.questionItems.getQuestionItems');
        Route::get("/questionItems/getQuestionItems", 'getQuestionItems')->name('teacher.questionItems.getQuestionItems');
        Route::post("/questionItems/setData", 'setData')->name('teacher.questionItems.setData');


        Route::get("/question/getQnaExams", 'getQnaExams')->name('teacher.question.getQnaExams');
        Route::get('/qnaExam/delete', 'delete')->name('teacher.qnaExam.delete');
    });


    Route::prefix('teacher')->controller(QuestionItemController::class)->group(function () {
        Route::get('/questionItems/index', 'index')->name('teacher.questionItems.index');
        Route::get('/questionItems/create', 'create')->name('teacher.questionItems.create');
        Route::get('/questionItems/{id}', 'show')->name('teacher.questionItems.show');
        Route::get('/questionItems/{id}/edit', 'edit')->name('teacher.questionItems.edit');
        Route::post('/questionItems/store', 'store')->name('teacher.questionItems.store');
        Route::put('/questionItems', 'update')->name('teacher.questionItems.update');
        Route::delete('/questionItems/{id}', 'destroyQuestion')->name('teacher.questionItems.destroyQuestion');
        Route::get('/questionItems', 'destroy')->name('teacher.questionItems.destroy');

        Route::get('/questionItems/getData/{id}', 'getData')->name('teacher.questionItems.getData');
        Route::post('/questionItems/import', 'import')->name('teacher.questionItems.import');
    });

    Route::prefix('teacher')->controller(ExamsAttemptController::class)->group(function () {
        Route::get('/exams-attempt/index', 'index')->name('teacher.exams.attempt.index');
    });
    
});
