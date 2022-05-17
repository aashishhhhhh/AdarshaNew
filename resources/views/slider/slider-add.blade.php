@extends('layouts.main')
@section('is_active_slider','active')
@section('title', 'Add Slider')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Slider</h3>
    </div>
    
    <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <textarea class="ckeditor form-control" name="title" name="wysiwyg-editor"></textarea>
    </div>
    
    <div class="form-group">
    <label for="exampleInputFile">Photo</label>
    <div class="form-group">

     <input type="file" name="photo[]" multiple>
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