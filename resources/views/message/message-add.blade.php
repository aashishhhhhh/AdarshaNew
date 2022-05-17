@extends('layouts.main')
@section('is_active_message','active')
@section('title', 'Add Message')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Message</h3>
    </div>
    
    <form action="{{route('message.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Name</label>
            <input type="hidden" name="title" value="Principle's Message" class="form-control" id="exampleInputEmail1" placeholder="Enter Principle's Name">
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Principle's Name">
            </div>
        <div class="form-group">
            <label for="exampleInputFile"> Principles Photo</label>
            <div class="form-group">
             <input type="file" name="photo">
            </div>
   </div>
   <label for="exampleInputEmail1">Message</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="message" name="wysiwyg-editor"></textarea>
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