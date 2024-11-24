@extends('navbar_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Student Regesteration Form</h1>
@php
$id = 0;
$name= '';
$fname = '';
foreach($rows as $row)
{
$id = $row->studentID;
$name = $row->stuName;
$fname = $row->stuFname;
}
@endphp
<form action="{{route('student.update',$id)}}" class="form mt-4 p-3 " method="POST">
    <h2 class="h4">Student Detial</h2>
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="number" name="id" class="form-control" id="id" placeholder="ID" value="{{$id}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$name}}">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">Father Name</label>
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Father Name" value="{{$fname}}">
                @error('fname')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="col">
            jjj
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" name="class" id="class" aria-label="Default select example">
                    <!-- <option selected disabled>Open this select menu</option> -->
                    @foreach ($class as $row )
                    <option value="{{$row->subjectID}}">{{$row->subName}}</option>
                    @endforeach
                </select>
                @error('class')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                    <!-- <option selected disabled>Open this select menu</option> -->
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Save</label>
                <button type="submit" class="btn btn-primary form-control">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection