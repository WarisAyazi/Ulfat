@extends('dashboard_master')



@section('content')

<div class="card shadow">
  <h5 class="card-header">Teacher Information </h5>
  <h4 class="card-header text-right">The Total Salary of <span class="h3 fw-bolder">{{$name}}</span> Teacher is <span class="h3 fw-bolder">{{$sum}}</span> .</h4>
  <h4 class="card-header text-right">Total students studies with <span class="h3 fw-bolder">{{$name}}</span> Teacher are <span class="h3 fw-bolder">{{$count}}</span> .</h4>
  <div class="card-body">
    <table class="table mt-2 text-center">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>Register Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($teacher as $row)
        <tr>
          <td>{{$row->teacherID}}</td>
          <td>{{$row->TeaName}}</td>
          <td>{{$row->TeaLastName}}</td>
          <td>{{$row->created_at}}</td>
          <td>
            <a href="{{route('teacher.edit',$row->teacherID)}}" class="btn btn-primary px-3  btn-sm">Edit</a>
            <a href="{{route('teacherDelete',$row->teacherID)}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<form action="{{route('salary')}}" method="POST" class="from m-5 ">
  @csrf
  <div class="row gap-3">
    <input type="number" name="id" class="form-control col mx-1" placeholder="Teacher ID" value="{{$id}}">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror

    <input type="text" name="month" class="form-control col mx-1" placeholder="Month">
    @error('month')
    <p class="text-danger">{{$message}}</p>
    @enderror

    <select class="form-select form-control col mx-1" name="year" aria-label="Default select example">
      <!-- <option selected disabled>Open this select menu</option> -->
      <option value="1403">1403</option>
      <option value="1404">1404</option>
      <option value="1405">1405</option>
      <option value="1406">1406</option>
    </select>
    @error('year')
    <p class="text-danger">{{$message}}</p>
    @enderror

    <input type="submit" class="form-control btn btn-primary col mx-1" value="Search">

  </div>
</form>

<h4 class="card-header text-right">The Total Salary of
  <span class="h3 fw-bolder">{{$year}}</span> in
  <span class="h3 fw-bolder">{{$month}}</span> of
  <span class="h3 fw-bolder">{{$name}}</span> Teacher is
  <span class="h3 fw-bolder">{{$sum1}}</span> .
</h4>
<h4 class="card-header text-right">Total students studies with <span class="h3 fw-bolder">{{$name}}</span> Teacher are <span class="h3 fw-bolder">{{$count1}}</span> .</h4>
<div class="card mt-5 shadow">
  <div class="card-header">
    Monthly Regestration
  </div>
  <div class="card-body">
    <table class="table text-center">
      <thead>
        <tr>
          <th>Name</th>
          <th>class</th>
          <th>Time</th>
          <!-- <th>MIN</th> -->
          <!-- <th>Num of MIN</th> -->
          <!-- <th>MAX</th> -->
          <!-- <th>Num of MAX</th> -->
          <th>Total Num of Students</th>
          <th>Salary</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($total as $row )
        <tr>
          <td>{{$row -> TeaName}}</td>
          <td>{{$row -> subName}}</td>
          <td>{{$row -> time}}</td>

          <td>{{$count}}</td>
          <td>{{$sum}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>



@endsection