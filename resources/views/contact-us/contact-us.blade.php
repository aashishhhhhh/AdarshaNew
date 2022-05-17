@extends('layouts.main')
@section('is_active_contact_us','active')
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
    <div class="card">
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Contact Us') }}</p>
                </div>
                @if ($content==null)
                <div class="col-md-6 text-right">
                    <a href="{{route('contactUs.create')}}"
                        class="btn btn-sm btn-primary">{{ __('Add Contact Us Content') }}
                        <i class="fas fa-address-book"></i></a>
                        
                </div>
                @else
                <div class="col-md-6 text-right">
                    <a href="{{route('contactUs-edit')}}"
                        class="btn btn-sm btn-primary">{{ __('Edit Contact Us Content') }}
                        <i class="fas fa-address-book"></i></a>
                        
                </div>
                @endif


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
        <th>Schools Contact No</th>
        <th>Email</th>
        <th>Principle's Contact No</th>
        <th>School Cordinater's Contact No</th>
        </tr>
        </thead>
        <tbody>
        @isset($content)
        <tr>
        <td>{{$content['school_contact_no']}}</td>
        <td>{{$content['email']}}</td>
        <td>{{$content['principle_contact_no']}}</td>
        <td>{{$content['school_co_contact_no']}}</td>
        @endisset

        </tr>
        </tbody>
        </table>
        </div>
        
        </div>
    <!-- /.card-body -->
</div>
@endsection