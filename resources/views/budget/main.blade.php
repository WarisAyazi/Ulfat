@extends('dashboard_master')

@section('search_nav')

<h3>Total number of Students are <span class="text-primary fw-bold">{{$num}}</span>
    and there monthly regestration is <span class="text-primary fw-bold">{{$numReg}}</span>.
    Total Budget is <span class="text-primary fw-bold">{{$amount}}</span></h3>

@endsection


@section('content')

<div class="container-fluid">

    <form action="{{route('budget.store')}}" class="form w-50 mx-auto" method="POST">
        @csrf
        <div class="mb-3 col">
            <label for="year" class="form-label ">Year</label>
            <select class="form-select form-control" name="year" id="year" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                <option value="1403">1403</option>
                <option value="1404">1404</option>
                <option value="1405">1405</option>
                <option value="1406">1406</option>
            </select>
            @error('year')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 col">
            <label for="save" class="form-label">Find</label>
            <input type="submit" class="form-control btn btn-primary" id="save" value="Find">
        </div>
    </form>


    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Result</h6>
            </div>
            <div class="card-body">
                @if (isset($conHam) && empty($conHam))
                <table class="table text-center table-striped table-lg">
                    <thead>
                        <tr>

                            <th>Months</th>
                            <th>Hamal</th>
                            <th>Saur</th>
                            <th>Jawza</th>
                            <th>Saratan</th>
                            <th>Asad</th>
                            <th>Sunbula</th>
                            <th>Mizan</th>
                            <th>Aqrab</th>
                            <th>Qaws</th>
                            <th>Jadi</th>
                            <th>Dalwa</th>
                            <th>Hoot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Regestrations</th>
                            <td>{{$conHam}}</td>
                            <td>{{$conSau}}</td>
                            <td>{{$conJaw}}</td>
                            <td>{{$conSar}}</td>
                            <td>{{$conAsa}}</td>
                            <td>{{$conSun}}</td>
                            <td>{{$conMiz}}</td>
                            <td>{{$conAqr}}</td>
                            <td>{{$conQaw}}</td>
                            <td>{{$conJad}}</td>
                            <td>{{$conDal}}</td>
                            <td>{{$conHoo}}</td>
                        </tr>
                        <tr>
                            <th>Fee</th>
                            <td>{{$amoHam}}</td>
                            <td>{{$amoSau}}</td>
                            <td>{{$amoJaw}}</td>
                            <td>{{$amoSar}}</td>
                            <td>{{$amoAsa}}</td>
                            <td>{{$amoSun}}</td>
                            <td>{{$amoMiz}}</td>
                            <td>{{$amoAqr}}</td>
                            <td>{{$amoQaw}}</td>
                            <td>{{$amoJad}}</td>
                            <td>{{$amoDal}}</td>
                            <td>{{$amoHoo}}</td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="text-right fw-bold">The total monthly regestration is <span class="text-primary fw-bold">{{$conYear}}</span> and total amount is <span class="text-primary fw-bold">{{$amoYear}}</span></h3>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection