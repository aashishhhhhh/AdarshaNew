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
                    <p class="">{{ __('About Us') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('aboutus.create')}}"
                        class="btn btn-sm btn-primary">{{ __('Add About Us Content') }}
                        <i class="fas fa-plus px-1"></i></a>
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
        <th>S.N</th>
        <th>Title</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
         @if($aboutus!="")
         @foreach ($aboutus->pages as $key=> $values)
        <tr>
            @php
              $value=json_decode($values->content,true);
            @endphp
            <td>{{$key+1}}</td>
        <td>{{$value['title']}}</td>
            
        <form action="{{ route('aboutus.destroy',$values->id) }}" method="POST" class="d-none">
            @method('DELETE')
            @csrf
            <td>
                <a href="{{route('aboutus.edit',$values->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit </a>
                <button class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</button>   
                @if ($value['title']!='INSTITUIONAL OVERVIEW' && $value['title']!='OUR MISSION')
                <a href="{{route('aboutus.addDetail',$values->id)}}" class="btn btn-primary"> Add Detail </a>
                <a href="{{route('aboutus.showDetail',$values->id)}}" class="btn btn-primary"> Show Detail </a>
                @endif

            </td>
        </form>

        </tr>
        @endforeach
        @endif   

        </tbody>
        </table>
        </div>
        
        </div>
    <!-- /.card-body -->
</div>
@endsection