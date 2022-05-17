@extends('layouts.main')
@section('title','Add About Us')
    
@section('is_active_about_us','active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add About Us Content</h3>
    </div>
    <form action="{{route('aboutus.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title"  class="form-control" id="exampleInputEmail1" placeholder="Enter Title" >
    </div>
    
    <label for="exampleInputEmail1">Content</label>
    <div class="form-group">
    <textarea class="ckeditor form-control" name="content" name="wysiwyg-editor"></textarea>
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
