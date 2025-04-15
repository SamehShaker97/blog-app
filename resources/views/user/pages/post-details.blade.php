@extends('layouts.user')
@section('content')
<div class="container">
  @if(session('error'))
  <div x-data="{open:true}" x-init="setTimeout(()=>open = false , 2000)" style="position: absolute; bottom: 0; right: 15px;">
    <div x-show="open" class="alert alert-danger" role="alert">
      <div>
        {{ session('error') }}
      </div>
    </div>
  </div>
  @endif
  <div class="details">
    <div class="content">
      <div class="image">
        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
      </div>
      <div class="text">
        <div class="head">
          <h1>{{ $post->title }}</h1>
          <p>{{ $post->content }}</p>
        </div>
        <div class="footer">
          <span>Posted by: {{ $post->name }}</span>
          <span>Posted at: {{ $post->created_at }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="content_comment">
    <div class="title_comment">
      <h1>{{$comments->count()}} Comments</h1>
    </div>
    <div class="comments">
      <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
        @if($comments->count() > 0)
        @foreach($comments as $comment)
        <a href="#">{{ $comment->user->name }}</a>
        <p>{{ $comment->comment_text }}</p>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        @endforeach
        @endif
      </div>
    </div>
    <form method="post" action="{{route('comments.store' , $post->id)}}">
      @csrf
        <div class="input">
          <div div class="title_input">
            <h1>Leave Comment</h1>
          </div>
          <div class="form_input">
            <input type="text" placeholder="Write comment..." name="comment_text">
            <button type="submit">
              Post Comment
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
              </svg>
            </button>
          </div>
        </div>
    </form>
  </div>
  </div>
  </div>
</div>  

@endsection
