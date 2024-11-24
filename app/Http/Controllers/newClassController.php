<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\student;
use App\Models\student_subject;
use App\Models\student_teacher;
use App\Models\student_time;
use App\Models\subject;
use App\Models\teacher;
use App\Models\time;
use Illuminate\Http\Request;

class newClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'class' => 'required',
            'month' => 'required',
            'time' => 'required',
            'teacher' => 'required',
            'fee' => 'required',
            'year' => 'required'
        ]);

        // return $request->id;
        fee::create(['amount' => $request->fee, 'month' => $request->month, 'year' => $request->year, 'subjects_id' => $request->class, 'students_id' => $request->id]);
        student_subject::create(['subjects_id' => $request->class, 'students_id' => $request->id]);
        student_teacher::create(['teachers_id' => $request->teacher, 'students_id' => $request->id]);
        student_time::create(['times_id' => $request->time, 'students_id' => $request->id]);
        return redirect()->route('student.show', compact($request->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher =  teacher::all();
        $student = student::all();
        $class =  subject::all();
        $time =  time::all();

        return view('newClass.create', compact('id'))
            ->with('teacher', $teacher)
            ->with('class', $class)
            ->with('time', $time);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
