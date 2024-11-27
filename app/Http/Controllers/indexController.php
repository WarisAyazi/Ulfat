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
        // return $request;
        $find = DB::connection()->select('select teachers.TeaName ,  fees.amount, fees.year 
        from teachers join fees on teachers.teacherID = fees.teachers_id   
        where teachers.teacherID = ' . $request->id . ' and fees.month = ' . $request->month . ' and year = ' . $request->year  . '  ; ');
        $sum = 0;
        $count = 0;
        $name = '';
        foreach ($find as $row) {
            $sum += $row->amount;
            $name = $row->TeaName;
            $count++;
        };
        return view('teacher.show')
            ->with('month', $request->month)
            ->with('year', $request->year)
            ->with('sum1', $sum)
            ->with('count1', $count);
    }
}
