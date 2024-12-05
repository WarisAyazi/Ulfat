@extends('navbar_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Add new Class</h1>
<div class="row justify-content-center">
    <form action="{{route('new.store',$id)}}" class="form mt-4 p-3 " method="POST" style="width:600px">
        <h2 class="h4">Class Detial</h2>
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" name="id" class="form-control" id="id" value="{{$id}}">
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <select class="form-select" name="class" id="class" aria-label="Default select example">
                        <option selected disabled>Class</option>
                        @foreach ($class as $row )
                        <option value="{{$row->subjectID}}">{{$row->subName}}</option>
                        @endforeach
                    </select>
                    @error('class')
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
                    <label class="form-label">Add</label>
                    <button type="submit" class="btn btn-primary form-control">Add</button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection