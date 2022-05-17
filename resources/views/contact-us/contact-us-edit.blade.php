@extends('layouts.main')
@section('is_active_contact_us','active')
@section('main_content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Contact Us Content</h3>
    </div>
    
    <form action="{{route('contactUs.updatee')}}" method="POST" >
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">School's Contact Number</label>
    <input type="text" value="{{$content['school_contact_no']}}" name="school_contact_no" class="form-control"  placeholder="Enter Number">
    <strong>@error('school_contact_no')
        {{$message}}
    @enderror</strong>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" value="{{$content['email']}}" name="email" class="form-control"  placeholder="Enter Email">
        <strong>@error('email')
            {{$message}}
        @enderror</strong>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Princilple's Contact Number</label>
        <input type="text" value="{{$content['principle_contact_no']}}" name="principle_contact_no" class="form-control"  placeholder="Enter Number">
        <strong>@error('principle_contact_no')
            {{$message}}
        @enderror</strong>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">School's Coordinator Contact number</label>
    <input type="text" value="{{$content['school_co_contact_no']	}}" name="school_co_contact_no" class="form-control"  placeholder="Enter Number">
    <strong>@error('school_co_contact_no')
        {{$message}}
    @enderror</strong>
    </div>
    
    <div class="form-check">
    </div>
    </div>
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
    @endsection