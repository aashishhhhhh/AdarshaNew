@extends('layouts.main')
@section('title', 'Edit Download')
@section('is_active_download','active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Result</h3>
    </div>
    
    <form action="{{route('download.update',$download)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" name="title" value="{{$download->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
            </div>
        <div class="form-group">
            <label for="exampleInputFile">Insert file if you want to update</label>
            <div class="form-group">
             <input type="file" name="file">
            </div>
   </div>
   @php
       $data=json_decode($download->content,true);
   @endphp
    <div class="form-check">
    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
@endsection