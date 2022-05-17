@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', ' Show Video')
@section('main_content')
{{-- @livewire('show-pictures', ['album' => $album])
 --}}
 <div>
    <div class="card text-sm ">
        <div class="card card-outline card-warning">
            @php
            $content= json_decode($album->content);
            @endphp
            <div class="card-header">
            <h3 class="card-title">{{$content[0]->title}}</h3>
            </div>
            <div class="card-body" style="text-align: center">
            {{-- The body of the card
                 --}}
            {!!$content[1]!!}

            </div>
           
            </div>
       
        {{-- @if ($msg!=null)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{$msg}}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif --}}
        
    {{-- <div class="col-12 mb-3">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('Gallery Images') }}
                </span>
            </div>
            @foreach ($album->pictures as $image)
            <span style="margin:5px" wire:click="removeImage('{{ $image->id }}')"><i class="fas fa-times"></i></i></span>
                <a href="{{ asset('storage/upload/' . $image->url) }}" target="_blank">
                    <img src="{{ asset('storage/thumbnails/' . $image->url) }}" alt=""
                class="px-1" width="100">
                </a>
            @endforeach
        </div>
    </div> --}}
    </div>
</div>
@endsection

