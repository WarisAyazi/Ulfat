<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class timeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $id = DB::connection()->select('select * from times where timeID = ' . $request->id . ';');
            return view('time.main')
                ->with('page', 'time')
                ->with('time', $id);
        } elseif ($request->has('name')) {
            $name = DB::connection()->select('select * from times where time = "' . $request->name . '" ;');
            return view('time.main')
                ->with('page', 'time')
                ->with('time', $name);
        } else {
            return view('time.main')
                ->with('page', 'time')
                ->with('time', time::all());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'time1' => 'required'
        ], [
            'time1.required' => 'The time field is required',
        ]);

        time::create(['time' => $request->time1]);
        $find = DB::connection()->select('select * from times where time = "' . $request->time1 . '" ;');

        $id = '';
        foreach ($find as $row) {
            $id = $row->timeID;
        };

        return redirect()->route('time.show', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $time = DB::connection()->select('select * from times where timeID = ' . $id . ' ;');
        $total = DB::connection()->select('select times.time , subjects.subName , teachers.TeaName FROM times 
        join subjects on times.timeID = subjects.times_id 
        join teachers on subjects.teachers_id = teachers.teacherID 
        Where times.timeID = ' . $id . ' ;');

        $name = '';
        foreach ($time as $row) {
            $name = $row->time;
        };

        $student = DB::connection()->select('select * from student_times where times_id = ' . $id . ' ;');
        $count = 0;
        foreach ($student as $row) {
            $count++;
        };

        return view('time.show')
            ->with('time', $time)
            ->with('page', 'time')
            ->with('count', $count)
            ->with('name', $name)
            ->with('total', $total);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $time = DB::connection()->select('select * from times where timeID = ' . $id . ' ;');
        $name = '';
        foreach ($time as $row) {
            $name = $row->time;
        };
        return view('time.edit', compact('id'))
            ->with('page', $time)
            ->with('name', $name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'time' => 'required'
        ], [
            'time.required' => 'The time field is required',

        ]);

        DB::connection()->update('update times
        SET time = "' . $request->time . '" where timeID = ' . $id . ' ;');
        return redirect()->route('time.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
