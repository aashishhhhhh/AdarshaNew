@extends('layouts.main')
<!--@section('is_active_contact_us','active')-->
@section('main_content')
@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Reset Password</h3>
</div>

<form class="form-horizontal" method="POST" action="{{ route('pass-change') }}">
    @csrf
<div class="card-body">
<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{isset($email) ? $email : ''}}">
 
</div>
 @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<input type="name" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{isset($name) ? $name : ''}}">
 
</div>
 @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">

             
</div>
 @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
</div>

<div class="form-group row">
<label for="inputPassword4" class="col-sm-2 col-form-label">Confirm Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword4" name="password_confirmation" placeholder="Confirm Password">

</div>
 @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
</div>

<div class="form-group row">
<div class="offset-sm-2 col-sm-10">

</div>
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-info">Submit</button>
<!--<button type="submit" class="btn btn-default float-right">Cancel</button>-->
</div>

</form>
</div>
@endsection