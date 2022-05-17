@extends('layouts.main')
@section('menu_show_site_settings', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('is_active_useful_links', 'active')
@section('main_content')
<div class="card card-primary"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
    <div class="card-header">
    <h3 class="card-title">Add Useful Link</h3>
    </div>
    
    <form action="{{route('useful_links_add')}}" method="POST" enctype="multipart/form-data">
         @csrf
            <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control"  placeholder="Enter Title">
    </div>
    
     <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
    <input type="text" name="link" class="form-control"  placeholder="Enter Link">
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