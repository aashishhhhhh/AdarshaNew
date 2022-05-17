@extends('layouts.main')
@section('is_active_slider','active')
@section('title', '')
@section('main_content')
    @livewire('slider-list', ['slider' => $slider,'page'=>$page])
@endsection