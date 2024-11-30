@extends('dashboard_master')

@section('search_nav')
<form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('subject.index')}}" method="get">
  @csrf
  <div class="input-group">
    <input type="number" class="form-control bg-light border-0 small" name="id" placeholder="Subject ID"
      aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="main-search">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg> </button>
    </div>
  </div>
</form>
<form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('subject.index')}}" method="get">
  @csrf
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" name="name" placeholder="Subject Name"
      aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="main-search">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg> </button>
    </div>
  </div>
</form>
<a href="{{route('subject.index')}}" class="btn btn-success mr-5">All Subjects</a>

@endsection

@section('content')




<div class="card shadow">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Subjects</h4>
  </div>
  <div class="card-body">
    <table class="table table-sm mt-2 text-center table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Language</th>
          <th>Year</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subject as $row)
        <tr>
          <td>{{$row->subjectID}}</td>
          <td>{{$row->subName}}</td>
          <td>{{$row->subLanguage}}</td>
          <td>{{$row->year}}</td>
          <td><a href="{{route('subject.show',$row->subjectID)}}" class="btn btn-info btn-sm">Details</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>











@endsection