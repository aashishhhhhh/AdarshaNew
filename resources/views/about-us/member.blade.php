@extends('layouts.main')
@section('is_active_about_us','active')
@section('title','About Us')
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
    <div class="card">
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Members') }}</p>
                </div>
                {{-- <div class="col-md-6 text-right">
                    <a href="{{route('aboutus.create')}}"
                        class="btn btn-sm btn-primary">{{ __('Add About Us Content') }}
                        <i class="fas fa-plus px-1"></i></a>
                </div> --}}
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
        <th>S.N</th>
        <th>Title</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $content=json_decode($aboutus->content);

            @endphp
        
        <tr>
            <td>1</td>
        <td>{{$aboutus->title}}</td>
            
        <form action="{{ route('aboutus.destroy',$aboutus->id) }}" method="POST" class="d-none">
            @method('DELETE')
            @csrf
            <td>
                <a href="{{route('aboutus.edit',$aboutus->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit </a>
                <button class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</button>   
                <a href="{{route('aboutus.addDetail',$aboutus->id)}}" class="btn btn-primary"> Add Detail </a>
                <a href="{{route('aboutus.showDetail',$aboutus->id)}}" class="btn btn-primary"> Show Detail </a>
            </td>   
        </form>

        </tr>

        </tbody>
        </table>
        </div>
        
        </div>
    <!-- /.card-body -->
</div>
@endsection