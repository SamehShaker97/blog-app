@extends('layouts.user')
@section('content')
<div class="container mt-5">
  @if(session('success'))
  <div x-data="{open:true}" x-init="setTimeout(()=>open = false , 2000)" style="position:absolute; bottom:0; right:15px; padding:10px; border-radius:5px;">
      <div x-show="open" class="alert alert-success" role="alert">
          <div>
              {{ session('success') }}
          </div>
      </div>
  </div>
  @elseif(session('error'))
  <div x-data="{open:true}" x-init="setTimeout(()=>open = false , 6000)" style="position:absolute; bottom:0; right:15px; padding:10px; border-radius:5px;">
      <div x-show="open" class="alert alert-danger" role="alert">
          <div>
              {{ session('error') }}
          </div>
      </div>
  </div>
  @endif
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Your Data</h1>
          <h5 class="card-title">Name : {{ Auth::user()->name }}</h5>
          <h5 class="card-title">Email : {{ Auth::user()->email }}</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Change Password</h1>
          <form method="POST" action="{{route('change_password' , auth()->user()->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="current_password" class="form-label">Current Password</label>
              <input type="password" class="form-control" id="current_password" name="old_password" >
            </div>
            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="confirm_password" name="password_confirmation" >
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <h2>Your Posts</h2>
      @if ($posts->isEmpty())
      <p>No posts found.</p>
      @else
      @foreach ($posts as $post)
      <div class="col-md-4 mt-5">
          <div class="card mb-3">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $post->title }}</h5>
                <img src="{{asset('storage/' . $post->image)}}" alt="post-image" style="width:120px; border-radius:10px;"/>
                <p class="card-text">{{ $post->content }}</p>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="{{route('user.edit' , $post->id)}}" class="btn btn-primary">Edit</a>
                  <form action="{{route('user.destroy' , $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </div>
              <div class="card-footer text-muted">
                Created at  {{ $post->created_at->diffForHumans() }}
              </div>
          </div>
      </div>
      @endforeach
      @endif
  </div> 
</div>
@endsection