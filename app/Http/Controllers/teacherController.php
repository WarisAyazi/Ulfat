<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        if ($request->has('id')) {
            $id = DB::connection()->select('select * from teachers where teacherID = ' . $request->id . ';');
            return view('teacher.main')
                ->with('teacher', $id);
        } elseif ($request->has('name')) {
            $name = DB::connection()->select('select * from teachers where TeaName = "' . $request->name . '" ;');
            return view('teacher.main')
                ->with('teacher', $name);
        } else {
            return view('teacher.main')
                ->with('teacher', teacher::all());
        }
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

            'name' => 'required',
            'last' => 'required',
            'fname' => 'required'
        ]);
        teacher::create([
            'TeaName' => $request->name,
            'TeaFname' => $request->fname,
            'TeaLastName' => $request->last
        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $find = DB::connection()->select('select teachers.teacherID, teachers.TeaName , subjects.subName , times.time ,fees.amount  
        from teachers join fees on teachers.teacherID = fees.teachers_id 
        join subjects on  fees.subjects_id = subjects.subjectID 
        JOIN times on subjects.times_id = times.timeID   
        where teachers.teacherID = ' . $id . ' ; ');

        $sum = 0;
        $count = 0;
        $name = '';
        $id = 0;
        foreach ($find as $row) {
            $sum += $row->amount;
            $name = $row->TeaName;
            $id = $row->teacherID;
            $count++;
        };

        $teacher = DB::connection()->select(' select * from `teachers` where `teacherID` =' . $id . ' limit 1;');
        return view('teacher.show', compact('teacher'))
            ->with('total', $find)
            ->with('sum', $sum)
            ->with('name', $name)
            ->with('id', $id)
            ->with('count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = DB::connection()->select('select * from teachers where teacherID = ' . $id . ' ;');
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'fname' => 'required'
        ]);
        DB::connection()->update('update teachers
        SET TeaName = "' . $request->name . '" , TeaFname = "' . $request->fname . '" , TeaLastName = "' . $request->last . '"  
            where teacherID = ' . $id . '  ;');
        return redirect()->route('teacher.show',  $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::connection()->delete('delete from teachers where teacherID = ' . $id . ' ;');
        return redirect()->route('teacher.index');
    }
}
