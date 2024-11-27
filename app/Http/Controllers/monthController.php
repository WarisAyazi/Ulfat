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
            'teacher' => 'required',
            'fee' => 'required',
            'year' => 'required'
        ]);
        fee::create(['amount' => $request->fee, 'month' => $request->month, 'year' => $request->year, 'subjects_id' => $request->class, 'students_id' => $request->id, 'teachers_id' => $request->teacher]);
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

        $stu_tea = DB::connection()->select('select * from students
        join student_teachers on students.studentID = student_teachers.students_id
        join teachers on  student_teachers.teachers_id = teachers.teacherID
        where students.studentID = ' . $id . ';');

        return view('month.create', compact('id'))
            ->with('class', $stu_sub)
            ->with('teacher', $stu_tea);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fees = DB::connection()->select('select * from fees where feeID = ' . $id . ' ;');

        $stuId = DB::connection()->select('select students.studentID from students
         join fees on students.studentID = fees.students_id
         where fees.feeID = ' . $id . ' ;');

        $findID = 0;
        foreach ($stuId as $row) {
            $findID =  $row->studentID;
        };

        $stu_sub = DB::connection()->select('select * from students
        join student_subjects on students.studentID = student_subjects.students_id
        join subjects on  student_subjects.subjects_id = subjects.subjectID
        where students.studentID = ' . $findID . ';');

        $stu_tea = DB::connection()->select('select * from students
        join student_teachers on students.studentID = student_teachers.students_id
        join teachers on  student_teachers.teachers_id = teachers.teacherID
        where students.studentID = ' . $findID . ';');

        return view('month.edit', compact('fees'))
            ->with('class', $stu_sub)
            ->with('findID', $findID)
            ->with('teacher', $stu_tea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'class' => 'required',
            'month' => 'required',
            'teacher' => 'required',
            'fee' => 'required',
            'year' => 'required'
        ]);

        DB::connection()->update('update fees
        SET amount = ' . $request->fee . ' , month = "' . $request->month . '" , year = ' . $request->year . ' , students_id = ' . $request->id . ' , teachers_id = ' . $request->teacher . ' , subjects_id = ' . $request->class . ' 
        where feeID = ' . $id . ' ;');
        return redirect()->route('student.show', $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $findID =  DB::connection()->select('select studentID from students join fees on students.studentID = fees.students_id where fees.feeID = ' . $id . ' ;');
        DB::connection()->delete('delete from fees where feeID = ' . $id . ' ;');
        $stuID = 0;
        foreach ($findID as $row) {
            $stuID = $row->studentID;
        };
        return redirect()->route('student.show', $stuID);
    }
}
