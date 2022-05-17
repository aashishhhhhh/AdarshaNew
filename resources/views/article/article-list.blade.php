@extends('layouts.main')
@section('is_active_article','active')

@section('title', 'Downloads')
@section('main_content')
<div class="card text-sm ">
    @if (session()->has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('msg')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Articles') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('article.create')}}"
                        class="btn btn-sm btn-primary">{{ __('Add Article') }}
                        <i class="fas fa-plus px-1"></i></a>
                        
                </div>
                <div class="col-md-6 text-right">

            </div>
        <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        
        </div>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>Writer Name</th>
        <th>Article Title</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($article->pages as $key=>$value)
            <tr>
                
                @php
                    $content= json_decode($value->content);
                @endphp
                <td>{{isset($content->writer_name) ? $content->writer_name : ''}}</td>
                <td>{{$value->title}}</td>
                <td>
                     
                    <a href="{{route('article.edit',$value->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{route('article.destroy',$value->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                   
                    
                </td>
                 
            </tr>
        @endforeach

        </tbody>
        </table>
        </div>
        
    
    <!-- /.card-body -->
</div>
@endsection