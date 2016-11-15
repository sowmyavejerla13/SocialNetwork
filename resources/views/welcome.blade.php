@extends('layouts.app')
@section('title')
Welcome
@endsection
@section('contents')
@include('includes.message-block')
<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{route('signup')}}"><!-- //route template for directing to route page -->
            <h4>SignUp</h4>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Your E-mail</label>
                <input class="form-control" type="text" name = "email" id="email" value="{{Request::old('email')}}">
            </div>
              <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name">Your FirstName</label>
                <input class="form-control" type="text" name = "first_name" id="first_name" value="{{Request::old('first_name')}}">
            </div>
              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name = "password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
    
    <div class="col-md-4">
        <h4>SignIn</h4>
        <form method="post" action="{{route('signin')}}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Your E-mail</label>
                <input class="form-control" type="text" name = "email" id="email" value="{{Request::old('email')}}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name = "password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>    
</div>
@endsection