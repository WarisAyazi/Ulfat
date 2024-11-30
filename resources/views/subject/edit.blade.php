@extends('navbar_master')
@section('content')

<div class="row mt-5 gap-3 ">
  @php
  $id = 0;
  $name= '';

  foreach($subject as $row)
  {
  $id = $row->subjectID;
  $name = $row->subName;

  }
  @endphp


  <div class="col shadow px-4 py-3 rounded-2">
    <h2 class="h4">Subject Update</h2>
    <form action="{{route('subject.update',$id)}}" class="form" method="POST">
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
          <option selected disabled>Open this select menu</option>
          <option value="dari">Dari</option>
          <option value="pashto">Pashto</option>
        </select>
        @error('lan')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <select class="form-select" name="year" id="year" aria-label="Default select example">
          <option selected disabled>Open this select menu</option>
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
        <label for="time" class="form-label">Time</label>
        <select class="form-select" name="time" id="time" aria-label="Default select example">
          <option selected disabled>Open this select menu</option>
          @foreach ($time as $row )
          <option value="{{$row->timeID}}">{{$row->time}}</option>
          @endforeach
        </select>
        @error('time')
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
        <label for="save" class="form-label">Update</label>
        <input type="submit" class="form-control btn btn-primary" id="save" value="Update">
      </div>
    </form>
  </div>





</div>

@endsection