@extends('layouts.main')
@section('is_active_notice','active')
@section('title', ' Notice')
@section('main_content')
@livewire('notice-list', ['notice' => $notice])
@endsection
@section('scripts')
<script>
    window.addEventListener('edit-notice', event=>{
      $('#edit-notice').modal('show');
    });
  </script>
  <script>
    window.addEventListener('add-notice', event=>{
      $('#add-notice').modal('show');
    });
  </script>
@endsection