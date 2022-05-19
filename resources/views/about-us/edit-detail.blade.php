@extends('layouts.main')
@section('title','Add Detail')
@section('is_active_about_us','active')
@section('main_content')
<div class="card card-primary">
    @php
        $content=json_decode($aboutus->content);
    @endphp
    <div class="card-header">
    <h3 class="card-title">Add Detail</h3>
    </div>
    <form action="{{route('aboutus-detail.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <input type="hidden" name="aboutUsId" value="{{$aboutus->id}}" name="" id="">
    <div class="division">
        <br>
        <br>
        <label for="exampleInputEmail1">Insert a Photo if you want to update</label>
        <div class="form-group">
            <input name="photo" type="file">
        </div>
        <label>  Name </label>
         <div class="form-group">
            <input type="text" name="name" value="{{$content->name}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Name" >
        </div>

        <label>  Designation </label> 
        <div class="form-group">
            @if ($aboutus->position==1 || $aboutus->position==2 || $aboutus->position==3)
              <input type="text" name="designation" value="{{$content->designation}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Designation" readonly >
            @else
            <input type="text" name="designation" value="{{$content->designation}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Designation"  >
            @endif

            </div>

        <label>  Position </label> 
        <div class="form-group">
                @if ($aboutus->position==1 || $aboutus->position==2 || $aboutus->position==3)
                  <input type="text" name="position" value="{{$aboutus->position}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Designation" readonly >
                @else
                <input type="text" name="position" value="{{$aboutus->position}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Designation"  >
                @endif
    
        </div>

        <label>  Contact no </label> 
        <div class="form-group">
                <input type="text" name="contact_no" value="{{$content->contact_no}}"  class="form-control" id="exampleInputEmail1">
    
        </div>

        
        <hr>
    </div>
   
    </div>
    <div class="form-check">
    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
    @endsection

    @section('scripts')
    <script>
        $('#AddDetail').click(function(){
            $('.division').append('<hr> <label> Insert Photo </label><div class="form-group"><input name="photo[]" type="file"></div> <label> Insert Name </label> <div class="form-group">  <input type="text" name="name[]"  class="form-control" id="exampleInputEmail1" placeholder="Enter Name" ></div> <label> Insert Designation </label> <div class="form-group">  <input type="text" name="Designation[]"  class="form-control" id="exampleInputEmail1" placeholder="Enter Designation" ></div>')
            // $('.division')
        });
    </script>
@endsection
