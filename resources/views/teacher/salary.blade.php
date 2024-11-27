<form action="{{route('salary')}}" method="POST" class="from m-5 ">
    @csrf
    <div class="row gap-3">
        <input type="number" name="id" class="form-control col mx-1" placeholder="Teacher ID" value="{{$id}}">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <input type="text" name="month" class="form-control col mx-1" placeholder="Month">
        @error('month')
        <p class="text-danger">{{$message}}</p>
        @enderror

        <select class="form-select form-control col mx-1" name="year" aria-label="Default select example">
            <!-- <option selected disabled>Open this select menu</option> -->
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

<h4 class="card-header text-right">The Total Salary of
    <span class="h3 fw-bolder">{{$year}}</span> in
    <span class="h3 fw-bolder">{{$month}}</span> of
    <span class="h3 fw-bolder">{{$name}}</span> Teacher is
    <span class="h3 fw-bolder">{{$sum1}}</span> .
</h4>
<h4 class="card-header text-right">Total students studies with <span class="h3 fw-bolder">{{$name}}</span> Teacher are <span class="h3 fw-bolder">{{$count1}}</span> .</h4>