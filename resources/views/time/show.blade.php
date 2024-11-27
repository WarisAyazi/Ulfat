@extends('dashboard_master')



@section('content')

<div class="card shadow">
  <h5 class="card-header">Time Information </h5>
  <div class="card-body">
    <table class="table mt-2 text-center">
      <thead>
        <tr>
          <th>Id</th>
          <th>Time</th>
          <th>Register Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($time as $row)
        <tr>
          <td>{{$row->timeID}}</td>
          <td>{{$row->time}}</td>
          <td>{{$row->created_at}}</td>
          <td>
            <a href="{{route('time.edit',$row->timeID)}}" class="btn btn-primary px-3  btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
            </a>
            <a href="{{route('teacherDelete',$row->timeID)}}" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="card mt-5 shadow">
  <div class="card-header">
    Relashanship Between Time, Subject and teacher
  </div>
  <div class="card-body">
    <table class="table text-center">
      <thead>
        <tr>
          <th>Time</th>
          <th>Classes</th>
          <th>Teachers</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($total as $row )
        <tr>
          <td>{{$row -> time}}</td>
          <td>{{$row -> subName}}</td>
          <td>{{$row -> TeaName}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>



@endsection