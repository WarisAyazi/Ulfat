@extends('dashboard_master')

@section('search_nav')
<form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('teacher.index')}}" method="get">
  @csrf
  <div class="input-group">
    <input type="number" class="form-control bg-light border-0 small" name="id" placeholder="Teacher's ID"
      aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>
<form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('teacher.index')}}" method="get">
  @csrf
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" name="name" placeholder="Teacher's Name"
      aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>
<a href="{{route('teacher.index')}}" class="btn btn-success mr-5">All Teachers</a>

@endsection

@section('content')




<div class="card shadow">
  <h5 class="card-header">Teacher Information</h5>
  <div class="card-body">
    <table class="table mt-2 text-center">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($teacher as $row)
        <tr>
          <td>{{$row->teacherID}}</td>
          <td>{{$row->TeaName}}</td>
          <td>{{$row->TeaLastName}}</td>
          <td><a href="{{route('teacher.show',$row->teacherID)}}" class="btn btn-info btn-sm">Details</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>











@endsection