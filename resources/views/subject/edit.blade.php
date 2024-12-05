@extends('navbar_master')
@section('content')


@php
$id = 0;
$name= '';

foreach($subject as $row)
{
$id = $row->subjectID;
$name = $row->subName;

}
@endphp


<h2 class="h2 fw-bold mt-3 text-center">Subject Update form</h2>
<div class="row justify-content-center">
  <form action="{{route('subject.update',$id)}}" class=" form mt-4 p-3" method="POST" style="width:600px;">
    <h2 class="h4">Subject Detial</h2>
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="sub" class="form-label">Subject Name</label>
      <input type="text" name="sub" class="form-control" id="sub" value="{{$name}}">
      @error('sub')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="lan" class="form-label">Subject Language</label>
      <select class="form-select" name="lan" id="lan" aria-label="Default select example">
        <option selected disabled>Subject Language</option>
        <option value="Dari">Dari</option>
        <option value="Pashto">Pashto</option>
      </select>
      @error('lan')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year</label>
      <select class="form-select" name="year" id="year" aria-label="Default select example">
        <option selected disabled>Year</option>
        <option value="1403">1403</option>
        <option value="1404">1404</option>
        <option value="1405">1405</option>
        <option value="1406">1406</option>
      </select>
      @error('year')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="teacher" class="form-label">Teacher</label>
      <select class="form-select" name="teacher" id="teacher" aria-label="Default select example">
        <option selected disabled>Teacher</option>
        @foreach ($teacher as $row )
        <option value="{{$row->teacherID}}">{{$row->TeaName}}</option>
        @endforeach
      </select>
      @error('teacher')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="time" class="form-label">Time</label>
      <select class="form-select" name="time" id="time" aria-label="Default select example">
        <option selected disabled>Time</option>
        @foreach ($time as $row )
        <option value="{{$row->timeID}}">{{$row->time}}</option>
        @endforeach
      </select>
      @error('time')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="save" class="form-label">Update</label>
      <input type="submit" class="form-control btn btn-primary" id="save" value="Update">
    </div>
  </form>
</div>







@endsection