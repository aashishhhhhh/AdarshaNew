@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', 'Edit Video')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Video</h3>
    </div>
    @php
        $content= json_decode($album->content);
    @endphp
    <form action="{{route('video.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" value="{{$content[0]->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Album Title">
            <input type="hidden" name="album_id" value="{{$album->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Video Title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> Youtube Link</label>
                <input type="text" name="link" class="form-control" value="{{$content[0]->link}}" id="exampleInputEmail1" placeholder="Enter Youtube Video Link">
                </div>
    {{-- <div class="form-group">
            <label for="exampleInputFile">Video</label>
            <div class="form-group">
             <input type="file" name="video" >
            </div>
   </div> --}}
   <label for="exampleInputEmail1">Description</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="description" name="wysiwyg-editor">{{$content[0]->description}}</textarea>
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