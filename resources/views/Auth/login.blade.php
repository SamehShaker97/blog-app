@extends('layouts.user')
@section('content')
<div class="login">
  <form method="post" action="{{route('login.store')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="Password">
    </div>
    <div class="mb-3">
      <button type="submit" class="login-btn">LOGIN</button>
      <a href="{{route('auth.redirect')}}">
        <img src="{{asset('images\google-login.png')}}" class="logo-google"/>
      </a>
    </div>
    <div class="text-center">
      <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
    </div>
  </form>
</div>
@endsection