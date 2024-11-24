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

<body class="bg-light">
  <img src="{{asset('logo.JPG')}}" class="rounded mx-auto d-block mt-3" style="width:100px" alt="...">
  <h1 class="text-center text-dark fw-bolder mt-5" style="font-family:arial">Eng Hamidullah Ulfat</h1>
  <div class="mx-auto w-75 mt-5" style="display:grid; align-items:center">
    <div class="row">
      <a href="{{route('student.index')}}" class="col m-2 px-4 py-5 bg-primary text-light btn text-start">
        <div>
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
          <h1>{{$stu}}</h1>
          <h5 class="">Search for students</h5>
        </div>
      </a>
      <a href="{{route('student.create')}}" class="col m-2 px-4 py-5 bg-secondary   text-light btn text-start  ">
        <div>
          <h5 class="mt-4">Add new Students</h5>
        </div>
      </a>
      <a href="{{route('month.create')}}" class="col m-2 px-4 py-5 bg-info text-light btn text-start">
        <div>

          <h5>Monthly Regestration</h5>
        </div>
      </a>
      <a href="" class="col m-2 px-4 py-5 bg-warning text-light btn text-start">
        <div>
          <h1>{{ $sub}} & {{$tim}}</h1>
          <h5>Subject and Time</h5>
        </div>
      </a>
    </div>
    <div class="row">
      <a href="" class="col m-2 px-4 py-5 bg-warning text-light btn text-start">
        <div>
          <h1>{{$tea}}</h1>
          <h4>Teacher Salary</h4>
        </div>
      </a>
      <a href="" class="col m-2 px-4 py-5 bg-info text-light btn text-start">
        <div>
          <h5 class="mt-4">Add new Student</h5>
        </div>
      </a>
      <a href="" class="col m-2 px-4 py-5 bg-secondary text-light btn text-start">
        <div>
          <h1>12</h1>
          <h5>Add teacher</h5>
        </div>
      </a>
      <a href="" class="col m-2 px-4 py-5 bg-primary text-light btn text-start">
        <div>
          <h1>8</h1>
          <h5>Add Subject</h5>
        </div>
      </a>


    </div>

  </div>

</body>

</html>