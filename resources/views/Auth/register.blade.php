@extends('layouts.user')
@section('content')
<div class="register">
  <form method="POST" action="{{route('register.store')}}" id="register-form">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Your name">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="Password">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirmation" id="exampleFormControlInput1" placeholder="Confirm Password">
    </div>
    <button 
      data-sitekey="{{config('services.recaptcha.site_key')}}"
      data-callback='onSubmit' data-action='submit' class="g-recaptcha register-btn">REGISTER</button>
      <p class="mt-3">Already have an account? <a href="{{route('login')}}">Login</a></p>
  </form>
</div>
@endsection