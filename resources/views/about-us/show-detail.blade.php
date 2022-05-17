@extends('layouts.main')
@section('is_active_about_us','active')
@section('title','Show Detail')
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
                    <p class="">{{ $title}}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('aboutus.addDetail',$id)}}"
                        class="btn btn-sm btn-primary">{{ __('Add Detail') }}
                        <i class="fas fa-plus px-1"></i></a>
                </div>
            </div>
        <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        
        </div>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Photo</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
           @php
           @endphp
         @foreach ($aboutus as $key=> $item)
        <tr>
            @php
              $value=json_decode($item->content,true);
              
            @endphp
            <td>{{$key+1}}</td>
        <td>{{$value['name']}}</td>
        <td>{{$value['designation']}}</td>
        <td>@if ($item->pictures!=null)
            @foreach ($item->pictures as $data)
            <a href="{{ asset('storage/upload/' . $data->url) }}" target="_blank">
                <img src="{{ asset('storage/thumbnails/' . $data->url) }}" alt=""
            class="px-1" width="100">
            </a>
            @endforeach
        @else
        @endif
    </td>
    <td>
        <a href="{{route('aboutus.editDetail',$item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
        <a href="{{route('aboutus.delete',$item->id)}}" class="btn btn-primary"><i class="fas fa-trash"></i>Delete</a>
        
    </td>
     
            {{-- <td>
                <a href="{{route('aboutus.edit',$values->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit </a>
                <button class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</button>    
                <a href="{{route('aboutus.addDetail',$values->id)}}" class="btn btn-primary"> Add Detail </a>
                <a href="{{route('aboutus.showDetail',$values->id)}}" class="btn btn-primary"> Show Detail </a>
            </td> --}}
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        </div>
    <!-- /.card-body -->
</div>
@endsection