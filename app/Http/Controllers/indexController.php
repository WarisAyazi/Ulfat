<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use App\Models\time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function salary(Request $request)
    {
        $find2 = DB::connection()->select('select teachers.TeaName , subjects.subName , times.time from teachers
        join subjects on teachers.teacherID  = subjects.teachers_id 
        JOIN times on subjects.times_id = times.timeID   
        where teachers.teacherID = ' . $request->id . ' ; ');

        $find = DB::connection()->select('select teachers.teacherID, teachers.TeaName , subjects.subName , times.time ,fees.amount  
        from teachers join fees on teachers.teacherID = fees.teachers_id 
        join subjects on  fees.subjects_id = subjects.subjectID 
        JOIN times on subjects.times_id = times.timeID   
        where teachers.teacherID = ' . $request->id . ' ; ');
        $sum = 0;
        $name = '';
        $id = 0;
        foreach ($find as $row) {
            $sum += $row->amount;
            $name = $row->TeaName;
            $id = $row->teacherID;
        };

        $find3 = DB::connection()->select('select student_teachers.teachers_id, student_teachers.students_id from teachers
         join student_teachers on teachers.teacherID = student_teachers.teachers_id 
             where student_teachers.teachers_id = ' . $id . ' ; ');
        $count = 0;
        foreach ($find3 as $row) {
            $count++;
        };

        $find1 = DB::connection()->select('select teachers.TeaName ,  fees.amount, fees.year, students.stuName , studentID 
        from teachers join fees on teachers.teacherID = fees.teachers_id JOIN  students on students.studentID = feeS.students_id  
        where teachers.teacherID = ' . $request->id . ' and fees.month = "' . $request->month . '" and year = ' . $request->year  . '  ; ');
        $sum1 = 0;
        $count1 = 0;
        foreach ($find1 as $row) {
            $sum1 += $row->amount;
            $name1 = $row->TeaName;
            $count1++;
        };
        $teacher = DB::connection()->select(' select * from `teachers` where `teacherID` =' . $id . ' limit 1;');
        return view('teacher.show', compact('teacher'))
            ->with('month', $request->month)
            ->with('year', $request->year)
            ->with('sum1', $sum1)
            ->with('count1', $count1)
            ->with('total', $find2)
            ->with('find', $find1)
            ->with('sum', $sum)
            ->with('name', $name)
            ->with('id', $id)
            ->with('page', 'teacher')
            ->with('count', $count);
    }

    public function stuSub(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $subject = DB::connection()->select('select * from subjects
        join times on subjects.times_id = times.timeID
        JOIN  teachers on subjects.subjectID = teachers.teacherID where subjectID = ' . $request->id . ' ;');
        $total = DB::connection()->select('select * from subjects join students on subjects.subjectID = students.subjects_id 
            join fees on students.studentID = fees.students_id where subjects.subjectID = ' . $request->id . ' and fees.month = "' . $request->month . '" and fees.year = ' . $request->year . ' ;');


        $countMon = 0;
        $countNum = 0;
        foreach ($total as $row) {
            $countMon += $row->amount;
            $countNum++;
        };

        $id = $request->id;
        return view('subject.show', compact('id'))
            ->with('total', $total)
            ->with('totID', $id)
            ->with('subject', $subject)
            ->with('countMon', $countMon)
            ->with('page', 'subject')
            ->with('countNum', $countNum);
    }
}
