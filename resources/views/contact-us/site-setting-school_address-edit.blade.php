@extends('layouts.main')
@section('menu_show_site_settings', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('is_active_useful_links', 'active')
@section('main_content')
<div class="card card-primary"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
    
    <form action="{{route('school_address_update')}}" method="POST" enctype="multipart/form-data">
         @csrf

        @php
            $content=json_decode($address->content);
        @endphp
            <div class="card-body">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$content->name}}" class="form-control"  placeholder="Enter Name">
    <input type="hidden" name="id" value="{{$address->id}}">
    </div>
    
     <div class="form-group">
    <label >Address</label>
    <input type="text" name="address" value="{{$content->address}}" class="form-control"  placeholder="Enter Address">
    </div>
    
    <label>Post Box</label>
    <input type="text" name="post_box" class="form-control" value="{{$content->post_box}}"  placeholder="Enter post_box_no">
    </div>
    </div>
    <div class="form-check">
    </div>
    <div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<!--<button type="submit" class="btn btn-default float-right">Cancel</button>-->
</div>
    </form></div>

@endsection