@extends('navbar_master')
@section('content')




  
<div class="row mt-3">
  {{-- This is first card --}}
  <form action="{{route('teacher.store')}}" method="POST">
    @csrf
<div class="col">
<div class="card">
  <div class="card-header">
    <h5>
      Teacher's details
    </h5>
  </div>
  <div class="card-body">
    <div class="col">

      <div class="px-2">
      <label class="form-lable" >Name:</label>
      <input type="text" name="name" class="form-control">
      </div>
    
      <div class="px-2">
        <label class="form-lable" >Last Name:</label>
        <input type="text" name="last" class="form-control">
      </div>
    
      <div class="px-2">
        <label  class="form-lable" >Father Name:</label>
        <input type="text" class="form-control" name="fname">
      </div>
  
  
      <input type="submit" value="save" class="btn btn-primary mx-2 mt-3">
        
    </div>
    
  </div>
  
</div>
</div>
</form>
  
 
  {{-- this is the new card --}}
  <div class="col">
  <div class="card">
    <div class="card-header">
      <h5>Subject</h5>
    </div>
    <div class="card-body">


        <div class="px-2">
        <label for="subName" class="form-lable" >Subject Name:</label>
        <input type="text" name="subName" class="form-control">
        </div>
      
       <div class="px-2">
          <label for="year" class="form-lable" >Year:</label>
          <input type="text" name="year" class="form-control">
          </div>
    
          <div class="px-2">
            <label for="teacher_id" class="form-lable" >Teacher:</label>
            <select name="teacher_id" id="teacher_id" class="form-select">
              @foreach($teacher as $row)
              
              <option value="{{$row->teacherId}}">{{$row->TeaName}}</option>

              @endforeach
              
            </select>
            </div>
            
          <div class="px-2">
              <label for="time_id" class="form-lable" >Time Id:</label>
              <input type="text" name="time_id" class="form-control">
          </div>
            <div class="px-2">
          <label for="subLanguage" class="form-lable" >Subject Language:</label>
          <select name="language" class="form-select">
            <option value="" disabled selected></option>
            <option value="dari">Dari</option>
            <option value="pashto">Pashto</option>
          </select>
        </div>
    
     
       
        
        <input type="submit" value="save" class="btn btn-primary mx-2 mt-3">
          
      </div>
    </div>
    </div>
    <div class="col">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h5>
              Time
            </h5>
          </div>
          <div class="card-body">
            <div class="col">
        
              <div class="px-2">
              <label for="" class="form-lable" >Time:</label>
              <input type="text" name="" class="form-control">
              </div>
            
            
              <input type="submit" value="save" class="btn btn-primary mx-2 mt-3">
                
            </div>
            
          </div>
          
        </div>
        </div>
          
    </div>
  </div>












    
@endsection