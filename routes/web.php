<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

route::get('/', [indexController::class, 'index'])->name('index');
route::get('search', [indexController::class, 'search'])->name('search');

route::resource('student', 'App\Http\Controllers\studentController');
route::resource('month', 'App\Http\Controllers\monthController');
route::resource('new', 'App\Http\Controllers\newClassController');
