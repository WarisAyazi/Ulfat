<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use Illuminate\Support\Facades\Route;

route::get('/', [indexController::class, 'index'])->name('index');
route::get('search', [indexController::class, 'search'])->name('search');

route::resource('student', 'App\Http\Controllers\studentController');
<<<<<<< HEAD
route::resource('month', 'App\Http\Controllers\monthController');
route::resource('new', 'App\Http\Controllers\newClassController');
=======


route::resource('time', 'App\Http\Controllers\timeController');

Route::resource('teacher', teacherController::class);



>>>>>>> c769b55f1883453aacb6b0d31ec78e0bfeeb6893
