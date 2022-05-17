@extends('layouts.main')
@section('title', 'Edit Article')
@section('is_active_article','active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Article</h3>
    </div>
    
    <form action="{{route('article.update',$article->id)}}" method="POST" enctype="multipart/form-data">
    
        @csrf
    <div class="card-body">
        @php
           $content= json_decode($article->content);
          
        @endphp
        <div class="form-group">
            <label > Writer Name</label>
            <input type="text" name="writer_name" class="form-control"  value="{{isset($content->writer_name) ? $content->writer_name : ''}}" placeholder="Enter Writer Name" required>
            <input type="hidden" name="_method" value="put" />

            </div>
            
             <label for="exampleInputEmail1">Writer Description</label>
            <div class="form-group">
            <textarea class="ckeditor form-control" name="writer_description" id="" cols="200" rows="10">{{isset($content->writer_description) ? $content->writer_description : ''}}</textarea>
            </div>
            
            <div class="form-group">
            <label > Insert image if you want to update previous image(Writer Image)</label>
            <input type="file" name="writer_image" class="form-control"  placeholder="Enter Writer Image" >
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Article  Title</label>
            <input type="text" name="article_title" class="form-control"  value="{{isset($content->article_title) ? $content->article_title : ''}}" placeholder="Enter Article Title" required>
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Insert image if you want to update previous image(Cover Image)</label>
            <input type="file" name="article_cover_image" class="form-control"  placeholder="Enter Cover Image" >
            </div>
            
           <div class="form-group">
            <label for="exampleInputFile"> Article Published Date</label>
            <div class="form-group">
                <input type="text" name="article_date" id="nepali-datepicker" placeholder="Article Date" value="{{isset($content->article_date) ? $content->article_date : ''}}" class="ndp-nepali-calendar" autocomplete="off" required>
                
            </div>
            </div>
            
            <label for="exampleInputEmail1">Article Content</label>
            <div class="form-group">
            <textarea class="ckeditor form-control" name="article_content" id="" cols="200" rows="10">{{isset($content->article_content) ? $content->article_content : ''}}</textarea>
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