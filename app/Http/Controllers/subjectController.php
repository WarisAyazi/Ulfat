<?php

namespace App\Http\Controllers;

use App\Models\subject;
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
                ->with('subject', $id);
        } elseif ($request->has('name')) {
            $name = DB::connection()->select('select * from subjects where subName = "' . $request->name . '" ;');
            return view('subject.main')
                ->with('subject', $name);
        } else {
            return view('subject.main')
                ->with('subject', subject::all());
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


        subject::create([

            'subName' => $request->subName,
            'subLanguage' => $request->language,
            'year' => $request->year,
            'teachers_id' => $request->teacherId,
            'times_id' => $request->time_id

        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
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
