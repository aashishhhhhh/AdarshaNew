@extends('layouts.main')
@section('is_active_gallery','active')
@section('title', ' Show Pictures')

@section('main_content')
@livewire('show-pictures', ['album' => $album])
@endsection