@extends('navbar_master')

@section('content')



  <div class="">
    <h5>Subject Infomation</h5>
  </div>
  <div class="card-body">
    <table class="table shadow">
      <thead>
        <tr>
          <th>Name</th>
          <th>Last Name</th>
          <th>Father Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach($teacher as $row)
        <tr>
          <td>{{$row->TeaName}}</td>
          <td>{{$row->TeaLastName}}</td>
          <td>{{$row->TeaFname}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>





@endsection