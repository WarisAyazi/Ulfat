<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\student;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class monthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $student = student::all();
        $class =  subject::all();
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
            'fee' => 'required',
            'year' => 'required'
        ]);
        fee::create(['amount' => $request->fee, 'month' => $request->month, 'year' => $request->year, 'subjects_id' => $request->class, 'students_id' => $request->id]);
        return redirect()->route('student.show', $request->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $stu_sub = DB::connection()->select('select * from students
        join student_subjects on students.studentID = student_subjects.students_id
        join subjects on  student_subjects.subjects_id = subjects.subjectID
        where students.studentID = ' . $id . ';');

        return view('month.create', compact('id'))
            ->with('class', $stu_sub);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $fees)
    {
        str($fees);
        $stu_sub = DB::connection()->select('select * from students
        join student_subjects on students.studentID = student_subjects.students_id
        join subjects on  student_subjects.subjects_id = subjects.subjectID
        where students.studentID = ' . $fees->id . ';');

        return view('month.edit')
            ->with('fees', $fees)
            ->with('class', $stu_sub);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Request $fee)
    {
        $id = 0;
        foreach ($fee as $row) {
            $id = $row->id;
        }
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
