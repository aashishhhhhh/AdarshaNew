@extends('layouts.main')
@section('title', 'Course List')
@section('menu_show_faculty', 'menu-open')
@section('menu_open', 'menu-open')
@section('s_child_slider', 'block')
@section('setting_course', 'active')
@section('main_content')
@livewire('course-list', ['faculty'=>$faculty])
@endsection
@section('scripts')
    <script>
        window.addEventListener('edit-course', event=>{
      $('#edit-course').modal('show');
    });
    </script>
    <script>
        window.addEventListener('add-course', event=>{
      $('#add-course').modal('show');
    });
    </script>
  
    
@endsection