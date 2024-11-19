<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

route::get('/', [indexController::class, 'index'])->name('index');

route::resource('student', 'App\Http\Controllers\studentController');
