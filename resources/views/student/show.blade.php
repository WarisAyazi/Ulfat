@extends('dashboard_master')




@section('content')

<div class="card shadow">
    <div class="card-header row">
        <p class="d-inline h4">Student Information</p>
        <div class="col d-flex justify-content-end">
            <a href="{{route('month.show', $id)}}" class="btn mx-3 btn-info ">Monthly Registration</a>
            <a href="{{route('new.show', $id)}}" class="btn   btn-success">Add a New Class</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Gander</th>
                    <th>create_at</th>
                    <th>updata_at</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($student as $row )
                <tr>
                    <td>{{$row -> studentID}}</td>
                    <td>{{$row -> stuName}}</td>
                    <td>{{$row -> stuFname}}</td>
                    <td>{{$row -> gender}}</td>
                    <td>{{$row -> created_at}}</td>
                    <td>
                        <a href="{{route('student.edit',$row->studentID)}}" class="btn btn-sm px-3 btn-primary">Edit</a>

                        <a href="{{route('student.destroy',$row->studentID)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card mt-5 shadow">
            <div class="card-header">
                Monthly Regestration
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Teacher Name</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stu_tea as $row )
                        <tr>
                            <td>{{$row -> stuName}}</td>
                            <td>{{$row -> TeaName}}</td>
                            <td>
                                @php
                                $newClass = array('stuName' => $row->stuName, 'teaName' => $row->TeaName);
                                @endphp
                                <a href="{{route('new.edit',$row->studentID)}}" class="btn btn-sm px-3 btn-primary">Edit</a>
                                <a href="{{route('new.destroy',$row->studentID)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mt-5 shadow">
            <div class="card-header">
                Monthly Regestration
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class Name</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stu_sub as $row )
                        <tr>
                            <td>{{$row -> stuName}}</td>
                            <td>{{$row -> subName}}</td>
                            <td>
                                <a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm px-3 btn-primary">Edit</a>
                                <a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mt-5 shadow">
            <div class="card-header">
                Monthly Regestration
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Time</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stu_tim as $row )
                        <tr>
                            <td>{{$row -> stuName}}</td>
                            <td>{{$row -> time}}</td>
                            <td>
                                <a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm px-3 btn-primary">Edit</a>
                                <a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

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
                    <th>Language</th>
                    <th>amount</th>
                    <th>month</th>
                    <th>year</th>
                    <th>create_at</th>
                    <th>updata_at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fee as $row )
                <tr>
                    <td>{{$row -> stuName}}</td>
                    <td>{{$row -> class}}</td>
                    <td>{{$row -> sublanguage}}</td>
                    <td>{{$row -> amount}}</td>
                    <td>{{$row -> month}}</td>
                    <td>{{$row -> year}}</td>
                    <td>{{$row -> created_at}}</td>
                    <td>{{$row -> updated_at}}</td>
                    @php
                    $fees = array('id'=> $row->studentID,'class' => $row->class, 'amount' => $row -> amount, 'month' => $row->month,'year' => $row->year)
                    @endphp
                    <td>
                        <a href="{{route('month.edit',$fees)}}" class="btn btn-sm px-3 btn-primary">Edit</a>
                        <a href="{{route('student.show',$row->studentID)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection