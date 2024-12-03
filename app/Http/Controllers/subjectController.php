<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\teacher;
use App\Models\time;
use App\Models\time_subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $id = DB::connection()->select('select * from subjects where subjectID = ' . $request->id . ';');
            return view('subject.main')
                ->with('page', 'subject')
                ->with('subject', $id);
        } elseif ($request->has('name')) {
            $name = DB::connection()->select('select * from subjects where subName = "' . $request->name . '" ;');
            return view('subject.main')
                ->with('page', 'subject')
                ->with('subject', $name);
        } else {
            $subject = DB::table('subjects')->select("*")->orderBy('subjectID', 'DESC')->get();
            return view('subject.main')
                ->with('page', 'subject')
                ->with('subject', $subject);
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
            'sub' => 'required',
            'lan' => 'required',
            'year' => 'required',
            'teacher' => 'required',
            'time' => 'required'
        ], [
            'sub.required' => 'The subject field is required',
            'lan.required' => 'The language field is required',
        ]);

        subject::create([
            'subName' => $request->sub,
            'subLanguage' => $request->lan,
            'year' => $request->year,
            'teachers_id' => $request->teacher,
            'times_id' => $request->time
        ]);

        time_subject::create(['subject_id' => $request->id, 'times_id' => $request->time]);

        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = DB::connection()->select('select * from subjects
         join times on subjects.times_id = times.timeID
        JOIN  teachers on subjects.subjectID = teachers.teacherID where subjectID = ' . $id . ' ;');
        return view('subject.show', compact('id'))
            ->with('page', 'subject')
            ->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $subject = DB::connection()->select('select * from subjects where subjectID = ' . $id . ' ;');
        return view('subject.edit', compact('subject'))
            ->with('time', time::all())
            ->with('page', 'subject')
            ->with('teacher', teacher::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sub' => 'required',
            'lan' => 'required',
            'year' => 'required',
            'teacher' => 'required',
            'time' => 'required'
        ], [
            'sub.required' => 'The subject field is required',
            'lan.required' => 'The language field is required',
        ]);
        DB::connection()->update('Update subjects
        SET subName = "' . $request->sub . '" , subLanguage = "' . $request->lan . '" , year = ' . $request->year . ', teachers_id = ' . $request->teacher . ' , times_id = ' . $request->time . ' 
        where subjectID = ' . $id . ' ;');

        return redirect()->route('subject.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
