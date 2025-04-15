@extends('layouts.user')
@section('content')
    <!-- Blog Start -->
  <section class="blog_main">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="blog_text">Our Blog</h1>
        </div>
      </div>
      <div class="blog_section_2">
        @if($posts->isNotEmpty())
          @foreach($posts as $post)
          <div class="box">
            <img src="{{asset('storage/' . $post->image)}}"  class="card-img-top">
            <div class="box-body">
              <h2>{{$post->title}}</h2>
              <p>
                <small class="text-muted">Posted on {{ $post->created_at->format('d-m-Y') }}</small><br>
                <small class="text-muted">{{$post->created_at->diffForHumans()}}</small><br/>
                <a href="{{route('single-post' , $post->id)}}" class="btn btn-outline-primary">Read More</a>              
              </p>
            </div>
          </div>
          @endforeach
        @else
        <h3 class="m-auto">No content writing.</h3>
        @endif
      </div>
    <!--blog end -->
  </div> 
  </section> 
@endsection