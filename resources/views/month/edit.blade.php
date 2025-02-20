@extends('navbar_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Monthly Update Form</h1>
@php
$id = 0;
$month= '';
$amount = 0;
$year = 0;
foreach($fees as $row)
{
$id = $row->feeID;
$month = $row->month;
$amount = $row->amount;
$year = $row->year;

}
@endphp
<form action="{{route('month.update',$id)}}" class="form mt-4 p-3 " method="POST">
    <h2 class="h4">Student Detial</h2>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">

            <div class="mb-3">
                <label for="id" class="form-label">Student ID</label>
                <input type="number" name="id" class="form-control" id="id" value="{{$findID}}">
            </div>
            <div class="mb-3">
                <label for="fee" class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" id="fee" value="{{$amount}}">
                @error('fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="month" class="form-label">Month</label>
                <select class="form-control" name="month" id="month" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    <option value="Hamal">1- Hamal</option>
                    <option value="Saur">2- Saur</option>
                    <option value="Jawza">3- Jawza</option>
                    <option value="Saratan">4- Saratan</option>
                    <option value="Asad">5- Asad</option>
                    <option value="Sumbula">6- Sumbula</option>
                    <option value="Mizan">7- Mizan</option>
                    <option value="Aqrab">8- Aqrab</option>
                    <option value="Qaws">9- Qaws</option>
                    <option value="Jadi">10- Jadi</option>
                    <option value="Dalwa">11- Dalwa</option>
                    <option value="Hoot">12- Hoot</option>
                </select>
                @error('month')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

        </div>

        <div class="col">
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" class="form-control" id="year" value="{{$year}}">
                @error('year')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" name="class" id="class" aria-label="Default select example">
                    @foreach ($class as $row )
                    <option value="{{$row->subjectID}}">{{$row->subName}}</option>
                    @endforeach
                </select>
                @error('class')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="teacher" class="form-label">Teacher</label>
                <select class="form-select" name="teacher" id="teacher" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    @foreach ($teacher as $row )
                    <option value="{{$row->teacherID}}">{{$row->TeaName}}</option>
                    @endforeach
                </select>
                @error('teacher')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Update</label>
                <button type="submit" class="btn btn-primary form-control">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection