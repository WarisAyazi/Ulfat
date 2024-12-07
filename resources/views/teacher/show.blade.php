@extends('dashboard_master')
@php
use Morilog\Jalali\Jalalian;
@endphp

@section('search_nav')

<h5 class=" text-primary">The Total budget of <span class="h4 fw-bolder text-info">{{$name}}</span> Teacher is <span class="h4 fw-bolder text-info">{{$sum}}</span>.
  &ThinSpace; And total students studies with <span class="h4 fw-bolder text-info">{{$name}}</span> Teacher are <span class="h4 fw-bolder text-info">{{$count}}</span> .</h5>
@endsection

@section('content')

<div class="card shadow">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Teacher Information</h5>
  </div>
  <div class="card-body">
    <table class="table mt-2 text-center">
      <thead>
        <tr>
          <th>ID</th>
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
          @php
          $da = $row->created_at;
          $newDa = Jalalian::fromDateTime($da)->format('Y-m-d -- H:i:s')
          @endphp
          <td>{{$newDa}}</td>
          <td>
            <a href="{{route('teacher.edit',$row->teacherID)}}" class="btn  btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="show-btn">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
              </svg></a>
            <!-- <a href="{{route('teacherDelete',$row->teacherID)}}" class="btn btn-danger btn-sm">Delete</a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="card mt-5 shadow">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Subjects and there Times teach by teacher {{$name}}.</h5>
  </div>
  <div class="card-body">
    <table class="table text-center table-sm table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>class</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($total as $row )
        <tr>
          <td>{{$row -> TeaName}}</td>
          <td>{{$row->subName}}</td>
          <td>{{$row -> time}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="card mb-5 shadow my-5">
  <div class="card-header">

    <form action="{{route('salary')}}" method="POST" class="from  ">
      @csrf
      <div class="row gap-3">
        <input type="number" name="id" class="form-control col mx-1" placeholder="Teacher ID" value="{{$id}}">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <select class="form-control col mx-1" name="month" id="month" aria-label="Default select example">
          <option selected disabled>Mouth</option>
          <option value="Hamal">1- Hamal</option>
          <option value="Saur">2- Saur</option>
          <option value="Jawza">3- Jawza</option>
          <option value="Saratan">4- Saratan</option>
          <option value="Asad">5- Asad</option>
          <option value="Sumbula">6- Sumbula</option>
          <option value="Mizan">7- Mizan</option>
          <option value="Aqrab">8- Aqrab</option>
          <option value="Qaws">9- Qaws</option>
          <option value="Jadi">10- Jadi</option>
          <option value="Dalwa">11- Dalwa</option>
          <option value="Hoot">12- Hoot</option>

        </select>
        @error('month')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <select class="form-select form-control col mx-1" name="time" id="time" aria-label="Default select example">
          <option selected disabled>Time</option>
          @foreach ($total as $row )
          <option value="{{$row->time}}">{{$row->time}}</option>
          @endforeach
        </select>
        @error('time')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <select class="form-select form-control col mx-1" name="year" aria-label="Default select example">
          <option selected disabled>Year</option>
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
  </div>

  @if (isset($year) && !empty($year))



  <div class="card-body py-3">
    <h5 class="m-0 font-weight-bold text-dark">
      The total Salary in
      <span class="text-info  fw-bolder">{{$year}}</span> year of
      <span class="text-info  fw-bolder">{{$month}}</span> month for
      <span class="text-info fw-bolder">{{$name}}</span> Teacher is
      <span class="text-info  fw-bolder">{{$sum1}}</span> .
    </h5>
    <h5 class=" m-0 font-weight-bold text-dark">The total students registere in <span class="text-info  fw-bolder">{{$month}}</span> mouth with <span class="text-info fw-bolder">{{$name}}</span> Teacher are <span class="text-info fw-bolder">{{$count1}}</span> .</h5>

    <div class="card-body">
      <table class="table text-center table-sm table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Teacher Name</th>
            <th>Student ID</th>
            <th>Student Name </th>
            <th>amount</th>
            <th>Year</th>
          </tr>
        </thead>
        <tbody>
          @php
          $count = 1;
          @endphp
          @foreach ($find as $row )
          <tr>
            <td>@php echo $count; $count++ @endphp
            </td>
            <td>{{$row -> TeaName}}</td>
            <td>{{$row -> studentID}}</td>
            <td>{{$row -> stuName}}</td>
            <td>{{$row->amount}}</td>
            <td>{{$row -> year}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


@endif






@endsection