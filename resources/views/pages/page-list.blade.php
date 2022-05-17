@extends('layouts.main')
@section('is_active_pages','active')
@section('title', ' Page')
@section('main_content')
<div class="card text-sm " >
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
                    <p class="">{{ __('Page List') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Add Page
                        <i class="fas fa-plus px-1"></i>
                      </button> 
                  
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
        <th>Page</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pages as $key=> $item)
        <tr>
         <td>{{$key+1}}</td>
         <td>
                  @if($item->slug=='about-us')
                <a href="{{route('aboutus.index')}}">{{$item->title}} </a>
                 @else
             {{$item->title}}
                @endif
             </td>
    
       
        <th>  @if ($item->show_on_homepage==1)
          <a href="{{route('disable',$item->id)}}" class="btn btn-danger">Disable</a>
          @endif
          @if ($item->show_on_homepage==0)
          <a href="{{route('enable',$item->id)}}" class="btn btn-primary">Enable</a>
          @endif
        </th>

        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        </div>
        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card card-primary">
            <form action="{{route('page-type.store')}}" method="POST">
                @csrf
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Page Name</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter page name">
            </div>
            
            </div>
            
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
           
            </div>
            </form>
            </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection