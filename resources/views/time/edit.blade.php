@extends('navbar_master')
@section('content')





<h2 class="h2 fw-bold mt-5 text-center">Time Update form</h2>
<div class="row justify-content-center">
  <form action="{{route('time.update',$id)}}" class="form" method="POST" style="width:600px;">
    @csrf
    <h2 class="h4">Time Detial</h2>

    @method('PUT')

    <div class="mb-3">
      <label for="time" class="form-label">Time</label>
      <input type="text" name="time" class="form-control" id="time" value="{{$name}}">
      @error('time')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="save" class="form-label">Update</label>
      <input type="submit" class="form-control btn btn-primary" id="save" value="Update">
    </div>
  </form>
</div>





@endsection