<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\student;
use Illuminate\Http\Request;

class budgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::all();
        $fee = fee::all();

        $num = 0;
        foreach ($student as $row) {
            $num++;
        };

        $amount = 0;
        foreach ($fee as $row) {
            $amount += $row->amount;
        };

        return view('budget.main')
            ->with('num', $num)
            ->with('page', 'student')
            ->with('amount', $amount);
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
        //
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
