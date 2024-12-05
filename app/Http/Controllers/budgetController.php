<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $numReg = 0;
        $amount = 0;
        foreach ($fee as $row) {
            $numReg++;
            $amount += $row->amount;
        };

        return view('budget.main')
            ->with('num', $num)
            ->with('numReg', $numReg)
            ->with('page', 'budget')
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
        $request->validate([
            'year' => 'required'
        ]);


        $year = $request->year;

        $Hamal = DB::connection()->select('select * from fees where mounth = "Hamal" and year = ' . $year . ' ;');
        $Saur = DB::connection()->select('select * from fees where mounth = "Saur" and year = ' . $year . ' ;');
        $Jawza = DB::connection()->select('select * from fees where mounth = "Jawza" and year = ' . $year . ' ;');
        $Saratan = DB::connection()->select('select * from fees where mounth = "Saratan" and year = ' . $year . ' ;');
        $Asad = DB::connection()->select('select * from fees where mounth = "Asad" and year = ' . $year . ' ;');
        $Sumbula = DB::connection()->select('select * from fees where mounth = "Sumbula" and year = ' . $year . ' ;');
        $Mizan = DB::connection()->select('select * from fees where mounth = "Mizan" and year = ' . $year . ' ;');
        $Aqrab = DB::connection()->select('select * from fees where mounth = "Aqrab" and year = ' . $year . ' ;');
        $Qaws = DB::connection()->select('select * from fees where mounth = "Qaws" and year = ' . $year . ' ;');
        $Jadi = DB::connection()->select('select * from fees where mounth = "Jadi" and year = ' . $year . ' ;');
        $Dalwa = DB::connection()->select('select * from fees where mounth = "Dalwa" and year = ' . $year . ' ;');
        $Hoot = DB::connection()->select('select * from fees where mounth = "Hoot" and year = ' . $year . ' ;');
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
