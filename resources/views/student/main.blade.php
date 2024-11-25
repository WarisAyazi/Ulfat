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
                    <td><a href="{{route('student.show')}}" class="btn btn-sm btn-info">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection