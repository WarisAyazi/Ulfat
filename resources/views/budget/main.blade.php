@extends('dashboard_master')

@section('search_nav')

<h2>Number of Students <span class="text-primary fw-bold">{{$num}}</span> and total Budget is <span class="text-primary fw-bold">{{$amount}}</span></h2>

@endsection


@section('content')

<div class="container-fluid">


    <div class="col-xl-8 col-lg-7">
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
    </div>



    <form action="{{route('subject.store')}}" class="form " method="POST">
        @csrf
        <div class="row">

            <div class="mb-3 col">
                <label for="sub" class="form-label">Subject Name</label>
                <input type="text" name="sub" class="form-control" id="sub" placeholder="Subject Name">
                @error('sub')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 col">
                <label for="month" class="form-label">Month</label>
                <select class="form-select form-control" name="month" id="month" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    <option value="dari">Dari</option>
                    <option value="pashto">Pashto</option>
                </select>
                @error('month')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="row">

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
                <input type="submit" class="form-control btn btn-primary" id="save" value="find">
            </div>
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