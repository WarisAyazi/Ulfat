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


        $year = $request->year;

        $Hamal = DB::connection()->select('select * from fees where month = "Hamal" and year = ' . $year . ' ;');

        $Saur = DB::connection()->select('select * from fees where month = "Saur" and year = ' . $year . ' ;');
        $Jawza = DB::connection()->select('select * from fees where month = "Jawza" and year = ' . $year . ' ;');
        $Saratan = DB::connection()->select('select * from fees where month = "Saratan" and year = ' . $year . ' ;');
        $Asad = DB::connection()->select('select * from fees where month = "Asad" and year = ' . $year . ' ;');
        $Sunbula = DB::connection()->select('select * from fees where month = "Sunbula" and year = ' . $year . ' ;');
        $Mizan = DB::connection()->select('select * from fees where month = "Mizan" and year = ' . $year . ' ;');
        $Aqrab = DB::connection()->select('select * from fees where month = "Aqrab" and year = ' . $year . ' ;');
        $Qaws = DB::connection()->select('select * from fees where month = "Qaws" and year = ' . $year . ' ;');
        $Jadi = DB::connection()->select('select * from fees where month = "Jadi" and year = ' . $year . ' ;');
        $Dalwa = DB::connection()->select('select * from fees where month = "Dalwa" and year = ' . $year . ' ;');
        $Hoot = DB::connection()->select('select * from fees where month = "Hoot" and year = ' . $year . ' ;');
        $findYear = DB::connection()->select('select * from fees where year = ' . $year . ' ;');

        $conYear = 0;
        $amoYear = 0;
        foreach ($findYear as $row) {
            $conYear++;
            $amoYear += $row->amount;
        };
        $conHam = 0;
        $amoHam = 0;
        foreach ($Hamal as $row) {
            $conHam++;
            $amoHam += $row->amount;
        };
        $conSau = 0;
        $amoSau = 0;
        foreach ($Saur as $row) {
            $conSau++;
            $amoSau += $row->amount;
        };
        $conJaw = 0;
        $amoJaw = 0;
        foreach ($Jawza as $row) {
            $conJaw++;
            $amoJaw += $row->amount;
        };
        $conSar = 0;
        $amoSar = 0;
        foreach ($Saratan as $row) {
            $conSar++;
            $amoSar += $row->amount;
        };
        $conAsa = 0;
        $amoAsa = 0;
        foreach ($Asad as $row) {
            $conAsa++;
            $amoAsa += $row->amount;
        };
        $conSun = 0;
        $amoSun = 0;
        foreach ($Sunbula as $row) {
            $conSun++;
            $amoSun += $row->amount;
        };
        $conMiz = 0;
        $amoMiz = 0;
        foreach ($Mizan as $row) {
            $conMiz++;
            $amoMiz += $row->amount;
        };
        $conAqr = 0;
        $amoAqr = 0;
        foreach ($Aqrab as $row) {
            $conAqr++;
            $amoAqr += $row->amount;
        };
        $conQaw = 0;
        $amoQaw = 0;
        foreach ($Qaws as $row) {
            $conQaw++;
            $amoQaw += $row->amount;
        };
        $conJad = 0;
        $amoJad = 0;
        foreach ($Jadi as $row) {
            $conJad++;
            $amoJad += $row->amount;
        };
        $conDal = 0;
        $amoDal = 0;
        foreach ($Dalwa as $row) {
            $conDal++;
            $amoDal += $row->amount;
        };
        $conHoo = 0;
        $amoHoo = 0;
        foreach ($Hoot as $row) {
            $conHoo++;
            $amoHoo += $row->amount;
        };

        return view('budget.main')
            ->with('conHam', $conHam)
            ->with('amoHam', $amoHam)

            ->with('conSau', $conSau)
            ->with('amoSau', $amoSau)

            ->with('conJaw', $conJaw)
            ->with('amoJaw', $amoJaw)

            ->with('conSar', $conSar)
            ->with('amoSar', $amoSar)

            ->with('conAsa', $conAsa)
            ->with('amoAsa', $amoAsa)

            ->with('conSun', $conSun)
            ->with('amoSun', $amoSun)

            ->with('conMiz', $conMiz)
            ->with('amoMiz', $amoMiz)

            ->with('conAqr', $conAqr)
            ->with('amoAqr', $amoAqr)

            ->with('conQaw', $conQaw)
            ->with('amoQaw', $amoQaw)

            ->with('conJad', $conJad)
            ->with('amoJad', $amoJad)

            ->with('conDal', $conDal)
            ->with('amoDal', $amoDal)

            ->with('conHoo', $conHoo)
            ->with('amoHoo', $amoHoo)

            ->with('conYear', $conYear)
            ->with('amoYear', $amoYear)

            ->with('amount', $amount)

            ->with('num', $num)
            ->with('numReg', $numReg)
            ->with('page', 'budget');
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
