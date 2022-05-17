@extends('layouts.main')
@section('is_active_gallery','active')
@section('main_content')
    @livewire('gallery', ['gallery' => $gallery])
@endsection