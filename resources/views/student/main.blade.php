@extends('dashboard_master')

@section('content')

<h1 class="h2 fw-bold mt-5 text-center">Student Regesteration Form</h1>

<form class="form mt-4 p-3 ">
    <h2 class="h4">Student Detial</h2>

    <div class="row">
        <div class="col">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="fname" placeholder="Father Name">
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" id="class" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="month" class="form-label">Month</label>
                <input type="text" class="form-control" id="month" placeholder="Month">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <select class="form-select" id="time" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacher" class="form-label">Teacher</label>
                <select class="form-select" id="teacher" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fee" class="form-label">Fee</label>
                <input type="number" class="form-control" id="fee" placeholder="Fee">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" placeholder="Year">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Save</label>
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>

        </div>
    </div>

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
 

@endsection