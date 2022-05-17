@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', ' Video Add')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Video</h3>
    </div>
    
    <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Album Title">
            <input type="hidden" name="album_id" value="{{$album->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Video Title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> Youtube Link</label>
                <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter Youtube Video Link">
                </div>
    {{-- <div class="form-group">
            <label for="exampleInputFile">Video</label>
            <div class="form-group">
             <input type="file" name="video" >
            </div>
   </div> --}}
   <label for="exampleInputEmail1">Description</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="description" name="wysiwyg-editor"></textarea>
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