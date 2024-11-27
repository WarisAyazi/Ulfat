<!DOCTYPE html>
<html lang="en">

<head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

@php
$stu = 0;
$tea = 0;
$sub = 0;
$tim = 0;


foreach ($student as $row ){
$stu++;
};
foreach ($teacher as $row ){
$tea++;
};
foreach ($subject as $row ){
$sub++;
};
foreach ($time as $row ){
$tim++;
};
@endphp

<body class="bg-light">
  <img src="{{asset('logo.png')}}" class="rounded mx-auto d-block mt-3" style="width:100px" alt="...">
  <h1 class="text-center text-dark fw-bolder mt-5" style="font-family:arial">Eng Hamidullah Ulfat</h1>
  <div class="mx-auto w-75 mt-5" style="display:grid; align-items:center">
    <div class="row">
      <a href="{{route('student.index')}}" class="col m-2 px-4 py-5 bg-primary text-light btn text-start">
        <div>
          <h1>{{$stu}}</h1>
          <h5 class="">Search for students
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

          </h5>
        </div>
      </a>
      <a href="{{route('student.create')}}" class="col m-2 px-4 py-5 bg-secondary   text-light btn text-start  ">
        <div>
          <h5 class="mt-4">Add new Student
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
          </h5>
        </div>
      </a>
      <a href="{{route('subject.index')}}" class="col m-2 px-4 py-5 bg-info text-light btn text-start">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
          </svg>

          <h1>{{ $sub}}</h1>
          <h5>Subjects</h5>
        </div>
      </a>
    </div>
    <div class="row">

      <a href="{{route('time.index')}}" class="col m-2 px-4 py-5 bg-warning text-light btn text-start">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>

          <h1>{{$tim}}</h1>
          <h5>Times</h5>
        </div>
      </a>

      <a href="{{route('teacher.index')}}" class="col m-2 px-4 py-5 bg-warning text-light btn text-start">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>

          <h1>{{$tea}}</h1>
          <h4>Teachers and Salary</h4>
        </div>
      </a>
      <a href="{{route('new.index')}}" class="col m-2 px-4 py-5 bg-info text-light btn text-start">
        <h5 class="mt-4">Add Teacher, Class and Time</h5>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
        </svg>

      </a>

      <a href="" class="col m-2 px-4 py-5 bg-primary text-light btn text-start">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
          </svg>

          <h5>About</h5>
        </div>
      </a>
    </div>


  </div>



</body>

</html>