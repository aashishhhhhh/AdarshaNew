@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', 'Edit Album')

@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Album</h3>
    </div>
    @php
        $content=json_decode($album->content);

    @endphp
    <form action="{{route('gallery.update',$album->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$content->title}}" placeholder="Enter Album Title">
            <input type="hidden" name="album_id" value="{{$album->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Gallery Title">
            </div>
    <div class="form-group">
            <label for="exampleInputFile">Photos</label>
            <div class="form-group">
             <input type="file" name="photo[]" multiple>
            </div>
   </div>
   <label for="exampleInputEmail1">Description</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="description" name="wysiwyg-editor">{{$content->description}}</textarea>
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