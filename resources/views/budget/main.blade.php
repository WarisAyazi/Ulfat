@extends('dashboard_master')

@section('search_nav')

<h3>Total number of Students are <span class="text-primary fw-bold">{{$num}}</span>
    and there monthly regestration is <span class="text-primary fw-bold">{{$numReg}}</span>.
    Total Budget is <span class="text-primary fw-bold">{{$amount}}</span></h3>

@endsection


@section('content')

<div class="container-fluid">


    <!-- <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myBarChart" width="668" height="320" style="display: block; width: 668px; height: 320px;" class="chartjs-render-monitor"></canvas>
                </div>
                <hr>
                Styling for the bar chart can be found in the
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>
    </div> -->



    <form action="{{route('budget.store')}}" class="form w-50 mx-auto" method="POST">
        @csrf


        <!-- <div class="mb-3 col">
            <label for="month" class="form-label">Month</label>
            <select class="form-control" name="month" id="month" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
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
        </div> -->

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

            </div>
        </div>
    </div>

</div>
@endsection