@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', 'Edit Gallery')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Gallery</h3>
    </div>
    @php
        $data=json_decode($gallery->content,true);
    @endphp
    <form action="{{route('gallery.update',$gallery)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="hidden" name="gallery" value="{{$gallery->id}}" id="">
            <input type="text" name="title" value="{{$data['title']}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Gallery Title">
            </div>
            <div class="col-12 mb-3">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{ __('Gallery Image') }}
                        </span>
                    </div>
                    @foreach ($gallery->pictures as $image)
                        <a href="{{ asset('storage/upload/' . $image->url) }}" target="_blank">
                            <img src="{{ asset('storage/thumbnails/' . $image->url) }}" alt=""
                        class="px-1" width="100">
                        </a>
                    @endforeach
                </div>
            </div>
    <div class="form-group">
            <label for="exampleInputFile">Insert photo if you want to add or update</label>
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