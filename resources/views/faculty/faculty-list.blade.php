@extends('layouts.main')
@section('title', 'Faculty')
@section('menu_show_faculty', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('setting_faculty', 'active')
@section('main_content')
@livewire('faculty-list', ['faculty' => $faculty])
@endsection
@section('scripts')
<script>
    window.addEventListener('edit-faculty', event=>{
      $('#edit-faculty').modal('show');
    });
  </script>
  <script>
    window.addEventListener('add-faculty', event=>{
      $('#add-faculty').modal('show');
    });
  </script>
@endsection