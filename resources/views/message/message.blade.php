@extends('layouts.main')
@section('is_active_message','active')
@section('title', 'Edit Message')
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
      @if ($message!=null)
      @php
          $data=json_decode($message->content,True);
      @endphp
      @endif
    <div class="card">
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Message') }}</p>
                </div>
                <!--<div class="col-md-6 text-right">-->
                <!--    <a href="{{route('message.create')}}"-->
                <!--        class="btn btn-sm btn-primary">{{ __('Add Message') }}-->
                <!--        <i class="fas fa-plus px-1"></i></a>-->
                <!--</div>-->
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
        <th>ID</th>
        <th>Principle's Name</th>
        <th>Photo</th>
        <th>Message</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if ($message!=null)
         <td>1</td>
         <td>{{$data['name']}}</td>
        <td>
          @foreach ($message->pictures as $picture)
          <a
          href="{{ asset('storage/upload/' . $picture->url) }}" target="_blank">
          <img src="{{ asset('storage/thumbnails/' . $picture->url) }}" alt=""
              class="px-1" width="100">
      </a>
      @endforeach
    </td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
            show message
          </button></td>
        <form action="{{ route('message.destroy',$message) }}" method="POST" class="d-none">
            @method('DELETE')
            @csrf
            <td>
                <button type="submit" class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</button> 
                <a href="{{route('message.edit',$message)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit </a> </td>
        </form>
        @endif

        </tr>
        </tbody>
        </table>
        </div>
        
        </div>
        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($message!=null)
                @php
                    $data=json_decode($message->content,True);
                @endphp
                <!--$data['message'];-->
          {{strip_tags($data['message'])}}
          @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection