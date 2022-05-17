@extends('layouts.main')
@section('title', 'Course Add')
@section('menu_show_faculty', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('setting_course', 'active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Course Content</h3>
    </div>
    <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Course Name</label>
    <input type="text" name="course"  class="form-control" id="exampleInputEmail1" placeholder="Course Name" required>
    <input type="hidden" name="facultyId" value="{{$faculty->id}}" >
    </div>
    <div class="form-group">
        <label for="exampleInputFile"> Photo</label>
        <div class="form-group">
         <input type="file" name="photo">
        </div>
</div>
    <label for="exampleInputEmail1">Content</label>
    <div class="form-group">
    <textarea class="ckeditor form-control" name="content" name="wysiwyg-editor" required></textarea>
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