@extends('navbar_master')

@section('content')





  <h5 class="text-center my-3 fw-bold display-5">Subject Infomation</h5>


    <table class="table shadow mt-2">
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
          <td><a href="" class="btn btn-info btn-sm">Details</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  
  





@endsection