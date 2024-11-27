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
use Illuminate\Support\Facades\DB;

class newClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = teacher::all();
        $time = time::all();
        return view('teacher.create')
            ->with('teacher', $teacher)
            ->with('time', $time);
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
            'time' => 'required',
            'teacher' => 'required'
        ]);
        student_subject::create(['subjects_id' => $request->class, 'students_id' => $request->id]);
        student_teacher::create(['teachers_id' => $request->teacher, 'students_id' => $request->id]);
        student_time::create(['times_id' => $request->time, 'students_id' => $request->id]);
        return redirect()->route('month.show', $request->id);
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
        $teacher =  teacher::all();
        $student = student::all();
        $class =  subject::all();
        $time =  time::all();

        return view('newClass.edit', compact('id'))
            ->with('teacher', $teacher)
            ->with('class', $class)
            ->with('time', $time);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'class' => 'required',
            'time' => 'required',
            'teacher' => 'required',
        ]);

        $findID =  DB::connection()->select('select students_id from student_teachers where student_teachers.stuTeaID = ' . $id . ' ;');
        DB::connection()->update('update student_subjects set subjects_id = ' . $request->class . '  where stuSubID = ' . $id . ' ;');
        DB::connection()->update('update student_teachers set teachers_id = ' . $request->teacher . ' where stuTeaID = ' . $id . ' ;');
        DB::connection()->update('update student_times set times_id = ' . $request->time . ' where stuTimID = ' . $id . ' ;');
        $stuID = 0;
        foreach ($findID as $row) {
            $stuID = $row->students_id;
        };
        return redirect()->route('student.show', $stuID);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $findID =  DB::connection()->select('select studentID from students join student_teachers on students.studentID = student_teachers.students_id where student_teachers.stuTeaID = ' . $id . ' ;');
        DB::connection()->delete('delete from student_teachers where stuTeaID = ' . $id . ' ;');
        DB::connection()->delete('delete from student_subjects where stuSubID = ' . $id . ' ;');
        DB::connection()->delete('delete from student_times where stuTimID = ' . $id . ' ;');
        $stuID = 0;
        foreach ($findID as $row) {
            $stuID = $row->studentID;
        };
        return redirect()->route('student.show', $stuID);
    }
}
