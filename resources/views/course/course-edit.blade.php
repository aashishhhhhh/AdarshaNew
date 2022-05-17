@extends('layouts.main')
@section('title', 'Course Edit')
@section('menu_show_faculty', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('setting_course', 'active')
@section('main_content')
<div class="card card-primary">

    @php
        $data=json_decode($course->content);
    @endphp
    <div class="card-header">
    <h3 class="card-title">Edit Course Content</h3>
    </div>
    <form action="{{route('course.update',$course)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Course Name</label>
    <input type="text" name="course"  class="form-control" value="{{$course->title}}" id="exampleInputEmail1" placeholder="Course Name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Choose Photo if you want to update</label>
        <div class="form-group">
         <input type="file" name="photo">
        </div>
</div>
<div class="form-group">

<div class="col-6 mt-3">
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text">
                {{ __('Image') }} <span class="text-danger px-1 font-weight-bold">*</span>
            </span>
        </div>
        @if ($course->pictures!=null)
        @foreach ($course->pictures as $item)
        <a href="{{ asset('storage/upload/' . $item->url) }}"
            target="_blank">
            <img src="{{ asset('storage/thumbnails/' . $item->url) }}"
                width="100">
        </a>
        @endforeach
        @endif
    </div>
</div>
</div>

    <label for="exampleInputEmail1">Content</label>
    <div class="form-group">
    <textarea class="ckeditor form-control" name="content" name="wysiwyg-editor" required>{{$data->content}}</textarea>
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