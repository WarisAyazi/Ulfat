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

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->has('id')) {
            $id = DB::connection()->select('select * from students where studentID = ' . $request->id . ';');
            return view('student.main')
                ->with('page', 'student')
                ->with('student', $id);
        } elseif ($request->has('name')) {
            $name = DB::connection()->select('select * from students where stuName = "' . $request->name . '" ;');
            return view('student.main')
                ->with('page', 'student')
                ->with('student', $name);
        } else {
            $student = DB::table('students')->select("*")->orderBy('studentID', 'DESC')->get();
            return view('student.main')
                ->with('page', 'student')
                ->with('student', $student);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher =  teacher::all();
        $student = student::all();
        $class =  subject::all();
        $time =  time::all();

        $id = 0;
        foreach ($student as $row) {
            $id = $row->studentID;
        };
        return view('student.create', compact('id'))
            ->with('active', 'student')
            ->with('teacher', $teacher)
            ->with('class', $class)
            ->with('page', 'student')
            ->with('time', $time);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'month' => 'required',
            'time' => 'required',
            'teacher' => 'required',
            'fee' => 'required',
            'year' => 'required'
        ]);


        student::create(['stuName' => $request->name, 'stuFname' => $request->fname, 'gender' => $request->gender, 'subjects_id' => $request->class]);
        $findID = DB::connection()->select('select studentID from students order by studentID DESC  LIMIT  1 ;');

        $stuID = 0;
        foreach ($findID as $row) {
            $stuID = $row->studentID;
        };
        fee::create(['amount' => $request->fee, 'month' => $request->month, 'year' => $request->year, 'subjects_id' => $request->class, 'students_id' => $stuID, 'teachers_id' => $request->teacher]);
        student_subject::create(['subjects_id' => $request->class, 'students_id' => $stuID]);
        student_teacher::create(['teachers_id' => $request->teacher, 'students_id' => $stuID]);
        student_time::create(['times_id' => $request->time, 'students_id' => $stuID]);
        return redirect()->route('student.show', $stuID);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stu_tea = DB::connection()->select('select * from students
         join student_teachers on students.studentID = student_teachers.students_id
         join teachers on  student_teachers.teachers_id = teachers.teacherID
         where students.studentID = ' . $id . ';');

        $stu_sub = DB::connection()->select('select * from students
         join student_subjects on students.studentID = student_subjects.students_id
         join subjects on  student_subjects.subjects_id = subjects.subjectID
         where students.studentID = ' . $id . ';');

        $stu_tim = DB::connection()->select('select * from students
         join student_times on students.studentID = student_times.students_id
         join times on  student_times.times_id = times.timeID
         where students.studentID = ' . $id . ';');

        $student = DB::connection()->select(' select * from `students` where `studentID` =' . $id . ' limit 1;');

        $fee = DB::connection()->select(' select students.studentID, students.stuName, subjects.subName as class,fees.feeID, fees.amount, fees.month , fees.year, subjects.sublanguage, fees.created_at, fees.updated_at from `students`
        join fees on students.studentID = fees.students_id
        join subjects on fees.subjects_id = subjects.subjectID
         where students.studentID =' . $id . ' ;');
        return view('student.show', compact('id'))
            ->with('student', $student)
            ->with('fee', $fee)
            ->with('stu_sub', $stu_sub)
            ->with('stu_tim', $stu_tim)
            ->with('page', 'student')
            ->with('stu_tea', $stu_tea);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class =  subject::all();
        $rows = DB::connection()->select('select * from students where studentID = ' . $id . ';');
        return view('student.edit', compact('rows'))
            ->with('page', 'student')
            ->with('class', $class);
    }

    /**
     * Update the specified resource in storage. 
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'fname' => 'required',
            'class' => 'required',
            'gender' => 'required'
        ]);
        DB::connection()->update('update students
         SET stuName = "' . $request->name . '" , stuFname = "' . $request->fname . '" , subjects_id = ' . $request->class . ', gender = "' . $request->gender .
            '" where studentID = ' . $request->id . '  ;');
        return redirect()->route('student.show',  $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::connection()->delete('delete from students where studentID = ' . $id . ' ;');
        return redirect()->route('student.index');
    }
}
