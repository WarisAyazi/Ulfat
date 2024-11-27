@extends('navbar_master')

@section('content')

@php
$id = 0;
$name= '';
$fname = '';
$last = '';
foreach($teacher as $row)
{
$id = $row->teacherID;
$name = $row->TeaName;
$fname = $row->TeaFname;
$last = $row->TeaLastName;
}
@endphp
<h1 class="h2 fw-bold mt-5 text-center">Teacher Update Form</h1>
<div class="row justify-content-center">
    <form action="{{route('teacher.update',$id)}}" class="form mt-4 p-3 " method="POST" style="width:600px">
        <h2 class="h4">Teacher Detial</h2>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$name}}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last" class="form-label">Last Name</label>
                    <input type="text" name="last" class="form-control" id="last" placeholder="Last Name" value="{{$last}}">
                    @error('last')
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
                <div class="mb-3">
                    <label for="Update" class="form-label">Update</label>
                    <input type="submit" class="form-control btn btn-primary" id="Update" value="Update">
                </div>

            </div>
    </form>
</div>
@endsection