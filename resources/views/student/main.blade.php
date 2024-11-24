@extends('dashboard_master')


@section('search_nav')
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('student.index')}}" method="get">
    @csrf
    <div class="input-group">
        <input type="number" class="form-control bg-light border-0 small" name="id" placeholder="Student ID"
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('student.index')}}" method="get">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" name="name" placeholder="Student Name"
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<a href="{{route('student.index')}}" class="btn btn-success mr-5">All Students</a>

@endsection

@section('content')

<div class="card shadow">
    <div class="card-header">
        Search For a Student
    </div>
    <div class="card-body">
        <table class="table text-center">
            <thead>
                <tr>

<<<<<<< HEAD
                    <th>ID</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $row )
                <tr>
                    <td>{{$row -> studentID}}</td>
                    <td>{{$row -> stuName}}</td>
                    <td>{{$row -> stuFname}}</td>
                    <td><a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm btn-info">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
=======
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

</form>

{{
<!-- select student.StudentID , student.FirstName , teacher.TeacherID  , teacher.FirstName from student join studnet_teacher on student.StudentID = studnet_teacher.StudentID JOIN  teacher on studnet_teacher.TeacherID = teacher.TeacherID; -->
<!-- select student.StudentID , student.FirstName , teacher.TeacherID  , teacher.FirstName from student join studnet_teacher on student.StudentID = studnet_teacher.StudentID JOIN  teacher on studnet_teacher.TeacherID = teacher.TeacherID WHERE teacher.TeacherID = 1; -->
<!-- select student.StudentID , student.FirstName , teacher.TeacherID  , teacher.FirstName from student join studnet_teacher on student.StudentID = studnet_teacher.StudentID JOIN  teacher on studnet_teacher.TeacherID = teacher.TeacherID WHERE student.StudentID = 1; -->
{{-- 
select student.StudentID , student.FirstName , teacher.TeacherID , teacher.FirstName , class.ClassID , class.ClassID , fee.Amount , fee.Month from student
join studnet_teacher on student.StudentID = studnet_teacher.StudentID
JOIN teacher on studnet_teacher.TeacherID = teacher.TeacherID
join class on teacher.TeacherID = class.ClassID
join fee on class.ClassID = fee.ClassID
WHERE student.StudentID = 1 AND fee.StudentID = 1;


select teacher.TeacherID , teacher.FirstName , class.ClassID , class.ClassID , fee.Amount , fee.Month from teacher
join class on teacher.TeacherID = class.ClassID
join fee on class.ClassID = fee.ClassID
WHERE teacher.TeacherID = 1;

select teacher.TeacherID , teacher.FirstName , class.ClassID , class.ClassName , fee.Amount , fee.Month , sum(fee.Amount) as 'salary' from teacher
join class on teacher.TeacherID = class.ClassID
join fee on class.ClassID = fee.ClassID
WHERE teacher.TeacherID = 1 AND fee.Month = 'KHOT' ;

select teacher.TeacherID , teacher.FirstName , class.ClassID , class.ClassName , fee.Amount , fee.Month from teacher
join class on teacher.TeacherID = class.ClassID
join fee on class.ClassID = fee.ClassID
WHERE teacher.TeacherID = 1 AND fee.Month = 'KHOT' ;
 
>>>>>>> c769b55f1883453aacb6b0d31ec78e0bfeeb6893

@endsection