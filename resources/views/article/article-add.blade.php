@extends('layouts.main')
@section('title', 'Add Article')
@section('is_active_article','active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Article</h3>
    </div>
    
    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1"> Writer Name</label>
            <input type="text" name="writer_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Writer Name">
            </div>
            
             <label for="exampleInputEmail1">Writer Description</label>
            <div class="form-group">
            <textarea class="ckeditor form-control" name="writer_description" id="" cols="200" rows="10"></textarea>
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Writer Image</label>
            <input type="file" name="writer_image" class="form-control" id="exampleInputEmail1" placeholder="Enter Writer Image">
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Article  Title</label>
            <input type="text" name="article_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Writer Image">
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Article  Cover Image</label>
            <input type="file" name="article_cover_image" class="form-control" id="exampleInputEmail1" placeholder="Enter Writer Image">
            </div>
            
           <div class="form-group">
            <label for="exampleInputFile"> Article Published Date</label>
            <div class="form-group">
                <input type="text" name="article_date" id="nepali-datepicker" placeholder="Article Date" class="ndp-nepali-calendar" autocomplete="off">
                
            </div>
            </div>
            
            <label for="exampleInputEmail1">Article Content</label>
            <div class="form-group">
            <textarea class="ckeditor form-control" name="article_content" id="" cols="200" rows="10"></textarea>
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