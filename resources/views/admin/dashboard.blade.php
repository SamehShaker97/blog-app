@extends('layouts.admin')
@section('title' , 'Dashboard')
@section('content')
<div class="row">
  <h1 class="text-center">Dashboard</h1>
  <div class="d-flex flex-row justify-content-center gap-5">
  <div class="col-lg-3 col-6">
      <div class="small-box text-bg-primary">
          <div class="inner text-center">
              <h3>{{$posts}}</h3>
              <p>Posts</p>
          </div> 
              <a href="{{route('posts.home')}}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i> </a>
      </div>
  </div>
  <div class="col-lg-3 col-6">
      <div class="small-box text-bg-success">
          <div class="inner text-center">
              <h3>{{$messages}}</h3>
              <p>Messages</p>
          </div> 
          <a href="{{route('messages')}}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i> 
          </a>
      </div>
  </div>
  <div class="col-lg-3 col-6">
      <div class="small-box text-bg-warning">
          <div class="inner text-center">
              <h3>{{$users}}</h3>
              <p>User Registrations</p>
          </div> 
          <a href="{{route('users.home')}}" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i> 
          </a>
      </div>
  </div>
  </div>
</div>

@endsection