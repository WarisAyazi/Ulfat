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
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                @error('name')
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
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                    <option selected disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="month" class="form-label">Month</label>
                <select class="form-control" name="month" id="month" aria-label="Default select example">
                    <option selected disabled>Month</option>
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
                <label for="fee" class="form-label">Fee</label>
                <input type="number" name="fee" class="form-control" id="fee" placeholder="Fee">
                @error('fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <select class="form-select" name="year" id="year" aria-label="Default select example">
                    <option selected disabled>Year</option>
                    <option value="1403">1403</option>
                    <option value="1405">1404</option>
                    <option value="1405">1405</option>
                    <option value="1406">1406</option>
                </select>
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