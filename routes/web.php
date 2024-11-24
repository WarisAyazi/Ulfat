<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use Illuminate\Support\Facades\Route;

route::get('/', [indexController::class, 'index'])->name('index');

route::resource('student', 'App\Http\Controllers\studentController');


route::resource('time', 'App\Http\Controllers\timeController');

Route::resource('teacher', teacherController::class);



