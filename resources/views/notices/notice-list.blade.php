@extends('layouts.main')
@section('is_active_notice','active')
@section('title', 'Result')
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
                    <p class="">{{ __('Result') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('notice.create')}}"
                        class="btn btn-sm btn-primary">{{ __('Add Notice') }}
                        <i class="fas fa-plus px-1"></i></a>
                        
                </div>
                <div class="col-md-6 text-right">

            </div>
        <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        
        </div>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>title</th>
        <th>File</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notice->pages as $key => $value)
            @php
                $data=json_decode($value->content,true);
            @endphp
            @if ($data!=null)
            <tr>
            <td>{{ $data[0]['title']}}</td>
            <td> <a class="btn btn-primary" href="{{ asset('storage/upload/' . $data['RealFile']) }}"
                target="_blank"> Show File<i class="fas fa-eye"></i> </a></td>
                <td><a class="btn btn-primary" href="{{route('notice.edit',$value->id)}}"
                    > <i class="fas fa-edit"></i>Edit </a>
                    <a class="btn btn-primary" href="{{route('notices.destroy',$value->id)}}"
                        ><i class="fas fa-trash"></i>Delete </a>
                </td>
            </tr>
            @endif

        @endforeach

        </tbody>
        </table>
        </div>
        
    
    <!-- /.card-body -->
</div>
@endsection