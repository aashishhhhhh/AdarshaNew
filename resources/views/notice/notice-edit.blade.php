@extends('layouts.main')
@section('is_active_notice','active')
@section('title', 'Edit Notice')

@section('main_content')
<div class="card card-primary">
    @php
        $data=json_decode($notice->content,true);
        // dd();
    @endphp
    <div class="card-header">
    <h3 class="card-title">Edit Notice </h3>
    </div>
    
    <form action="{{route('notices-update')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Heading</label>
            <input type="text" value="{{$notice->title}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Notice Heading">
            </div>
        <div class="form-group">
            <label for="exampleInputFile"> Nepali Date</label>
            <div class="form-group">
                <input type="text" value="{{$data[0]['date']}}" name="date" id="nepali-datepicker" placeholder="Nepal Date" class="ndp-nepali-calendar" autocomplete="off">
                <input type="hidden" name="noticeId" value="{{$notice->id}}">
            </div>
        </div>
   <label for="exampleInputEmail1">Notice</label>
    <div class="form-group">
        <textarea class="ckeditor form-control" name="notice" name="wysiwyg-editor" required>{{$data[0]['notice']}}</textarea>
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
