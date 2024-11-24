<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AddTeacher.main')
                    ->with('teacher', teacher::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = teacher::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // return $request;
        teacher::create([
            'TeaName'=>$request->name,
            'TeaFname'=>$request->fname,
            'TeaLastName'=>$request->last
            // 'subName'=>$request->subName,
            // 'subLanguage'=>$request->language,
            // 'year'=>$request->year
            
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
