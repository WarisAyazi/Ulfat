<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use Illuminate\Support\Facades\Route;

route::get('/', [indexController::class, 'index'])->name('index');
route::post('salary', [indexController::class, 'salary'])->name('salary');
route::get('search', [indexController::class, 'search'])->name('search');

route::resource('student', 'App\Http\Controllers\studentController');

route::resource('month', 'App\Http\Controllers\monthController');
route::resource('new', 'App\Http\Controllers\newClassController');


route::resource('time', 'App\Http\Controllers\timeController');

Route::resource('teacher', 'App\Http\Controllers\teacherController');

Route::resource('subject', 'App\Http\Controllers\subjectController');

route::get('monthDelete/{id}', 'App\Http\Controllers\monthController@destroy')->name('monthDelete');
route::get('newDelete/{id}', 'App\Http\Controllers\newClassController@destroy')->name('newDelete');
route::get('studentDelete/{id}', 'App\Http\Controllers\studentController@destroy')->name('studentDelete');
route::get('teacherDelete/{id}', 'App\Http\Controllers\teacherController@destroy')->name('teacherDelete');
