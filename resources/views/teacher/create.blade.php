@extends('navbar_master')
@section('content')

<div class="row mt-5 gap-3 ">
  <div class="col shadow px-4 py-3 rounded-2">
    <h2 class="h4">Teacher Detial</h2>
    <form action="{{route('teacher.store')}}" class="form" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="last" class="form-label">Last Name</label>
        <input type="text" name="last" class="form-control" id="last" placeholder="Last Name">
        @error('last')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="fname" class="form-label">Father Name</label>
        <input type="text" name="fname" class="form-control" id="fname" placeholder="Father Name">
        @error('fname')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="save" class="form-label">Save</label>
        <input type="submit" class="form-control btn btn-primary" id="save" value="Save">
      </div>
    </form>
  </div>


  <div class="col shadow px-4 py-3 rounded-2">
    <h2 class="h4">Subject Detial</h2>
    <form action="{{route('subject.store')}}" class="form" method="POST">
      @csrf
      <div class="mb-3">
        <label for="sub" class="form-label">Subject Name</label>
        <input type="text" name="sub" class="form-control" id="sub" placeholder="Subject Name">
        @error('sub')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="lan" class="form-label">Subject Language</label>
        <select class="form-select form-control" name="lan" id="lan" aria-label="Default select example">
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
        <select class="form-select form-control" name="year" id="year" aria-label="Default select example">
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
        <label for="time" class="form-label">Time</label>
        <select class="form-select form-control" name="time" id="time" aria-label="Default select example">
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
        <label for="teacher" class="form-label">Teacher</label>
        <select class="form-select form-control" name="teacher" id="teacher" aria-label="Default select example">
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
        <label for="save" class="form-label">Save</label>
        <input type="submit" class="form-control btn btn-primary" id="save" value="Save">
      </div>
    </form>
  </div>


  <div class="col shadow px-4 py-3 rounded-2">
    <h2 class="h4">Time Detial</h2>
    <form action="{{route('time.store')}}" class="form" method="POST">
      @csrf
      <div class="mb-3">
        <label for="time1" class="form-label">Time</label>
        <input type="text" name="time1" class="form-control" id="time1" placeholder="Time">
        @error('time1')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="save" class="form-label">Save</label>
        <input type="submit" class="form-control btn btn-primary" id="save" value="Save">
      </div>
    </form>
  </div>


</div>

@endsection