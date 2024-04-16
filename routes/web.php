<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/teacher/route.php';
require __DIR__.'/teacher/auth.php';
require __DIR__.'/backend/route.php';
require __DIR__.'/backend/auth.php';
require __DIR__.'/frontend/route.php';
require __DIR__.'/frontend/auth.php';
require __DIR__.'/student/auth.php';
require __DIR__.'/student/route.php';
