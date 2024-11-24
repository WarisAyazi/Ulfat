<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use App\Models\time;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('student', student::all())
            ->with('subject', subject::all())
            ->with('time', time::all())
            ->with('teacher', teacher::all());
    }
}
