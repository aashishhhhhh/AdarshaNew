@extends('layouts.main')
@section('is_active_result','active')
@section('title', ' Add Result')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Result</h3>
    </div>
    
    <form action="{{route('result.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
            </div>
        <div class="form-group">
            <label for="exampleInputFile">File</label>
            <div class="form-group">
             <input type="file" name="file">
            </div>
   </div>
   <label for="exampleInputEmail1">Message</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="description" name="wysiwyg-editor" required></textarea>
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