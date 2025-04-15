@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    @if($posts->isNotEmpty())
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Status</th>
          <th scope="col">User Name</th>
          <th scope="col">Image</th>
          <th scope="col">Created at</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->content}}</td>
          <td>
            @if($post->status == 'active')
            <span class="badge bg-success">Active</span>
            @elseif ($post->status == "pending")
            <span class="badge bg-warning">Pending</span>
            @elseif ($post->status == "rejected")
            <span class="badge bg-danger">Rejected</span>
            @endif
          </td>
          <td>{{$post->name}}</td>
          <td><img src="{{asset('storage/'. $post->image)}}" alt="Post Image" style="width: 60px; height: 50px;"></td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>
            <div class="d-flex gap-1">
              <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              <a href="{{route('accept_posts' , $post->id)}}" class="btn btn-sm btn-success">Accept</a>
              <a href="{{route('reject_posts' , $post->id)}}" class="btn btn-sm btn-danger">Reject</a>
            </div>
          </td>
        </tr>
        @endforeach 
      </tbody>
    </table>
    @else
    <h1 class="text-center">No posts found.</h1>
    @endif
    {{$posts->links()}}
</div>
@endsection