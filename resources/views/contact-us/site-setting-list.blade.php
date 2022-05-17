@extends('layouts.main')
@section('menu_show_site_settings', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('is_active_students', 'active')
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
                    <p class="">{{ __('Site Setting') }}</p>
                </div>
              
                <div class="col-md-6 text-right">
                    <a href="{{route('site-setting-add')}}"
                        class="btn btn-sm btn-primary">{{ __('Add Site Setting(Contact Us)') }}
                        <i class="fas fa-address-book"></i></a>
                </div>
              


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
        <th>S.N.</th>
        <th>Title</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $key => $value)
        @php
            
            $content= json_decode($value->content);
           
        @endphp
        <tr>
        <td>{{$key+1}}</td>
        <td>{{$value->title}}</td>
        <td>{{$content->email}}</td>
        <td>{{$content->phone}}</td>
        <td><a href="{{route('site-setting-edit',$value->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
        <a href="{{route('site-setting-delete',$value->id)}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i>Delete</a>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        </div>
    <!-- /.card-body -->
</div>
@endsection