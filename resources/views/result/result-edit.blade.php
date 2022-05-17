@extends('layouts.main')
@section('is_active_result','active')
@section('title', ' Edit Result')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Result</h3>
    </div>
    
    <form action="{{route('result.update',$result)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" value="{{$result->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
            </div>
          
        <div class="form-group">
            <label for="exampleInputFile">Insert file if you want to update</label>
            <div class="form-group">
             <input type="file" name="file">
            </div>
   </div>
   <label for="exampleInputEmail1">Message</label>
   @php
       $data=json_decode($result->content,true);
   @endphp
    <div class="form-group">
        <textarea class="ckeditor form-control" name="description" name="wysiwyg-editor" required>{{$data[0]['description']}}</textarea>
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