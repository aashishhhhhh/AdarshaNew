@extends('layouts.main')
@section('is_active_message','active')
@section('title', 'Edit Message')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Message</h3>
    </div>
    @php
    // $data=json_decode($message['content'],True);
    $data=json_decode($message->content);
    
@endphp
    <form action="{{route('message.update',$message)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Name</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Princilple's Name">
            </div>
        <div class="form-group">
            <label for="exampleInputFile"> Principles Photo</label>
            <div class="form-group">
             <input type="file" value="" name="photo">
            </div>
   </div>
   <label for="exampleInputEmail1">Message</label>
    <div class="form-group">
    <textarea class="ckeditor form-control" name="message" id="" cols="200" rows="10">{{$data->message}}</textarea>
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