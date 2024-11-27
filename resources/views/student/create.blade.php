@extends('navbar_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Student Regesteration Form</h1>

<form action="{{route('student.store')}}" class="form mt-4 p-3 " method="POST">
    <h2 class="h4">Student Detial</h2>
    @csrf
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="4400">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">Father Name</label>
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Father Name" value="4400">
                @error('fname')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
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
                <label for="month" class="form-label">Month</label>
                <input type="text" name="month" class="form-control" id="month" placeholder="Month" value="4400">
                @error('month')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <select class="form-select" name="time" id="time" aria-label="Default select example">
                    <!-- <option selected disabled>Open this select menu</option> -->
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
                    <!-- <option selected disabled>Open this select menu</option> -->
                    @foreach ($teacher as $row )
                    <option value="{{$row->teacherID}}">{{$row->TeaName}}</option>
                    @endforeach
                </select>
                @error('teacher')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fee" class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" id="fee" placeholder="Fee" value="4400">
                @error('fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" name="year" class="form-control" id="year" placeholder="Year" value="4400">
                @error('year')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Save</label>
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>

        </div>
    </div>


</form>
<script>
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
    });
</script>

@endsection