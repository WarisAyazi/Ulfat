@extends('navbar_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Class Update Form</h1>


<form action="{{route('month.update',$fee)}}" class="form mt-4 p-3 " method="POST">
    <h2 class="h4">Student Detial</h2>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="number" name="id" class="form-control" id="id" value="{{$fees->id}}">
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
                <label for="month" class="form-label">Month</label>
                <input type="text" name="month" class="form-control" id="month" placeholder="Month" value="{{$fees->month}}">
                @error('month')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="fee" class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" id="fee" value="{{$amount}}">
                @error('fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" class="form-control" id="year" value="{{$year}}">
                @error('year')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Update</label>
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection