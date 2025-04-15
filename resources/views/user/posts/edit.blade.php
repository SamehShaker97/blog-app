@extends('layouts.user')
@section('content')
<div class="col-lg-6 m-auto">
    <div class="card card-primary card-outline mt-5">
        <div class="card-header">
            <div class="card-title">Update Post</div>
        </div>
        <form form method="POST" action="{{route('user.update' , $post->id)}}" enctype="multipart/form-data"> <!--begin::Body-->
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3"> 
                    <label for="exampleInputTitle" class="form-label">Title</label> 
                    <input type="text" class="form-control" value="{{$post->title}}" name="title" id="exampleInputTitle">
                </div>
                <div class="mb-3"> 
                    <label for="exampleInputContent" class="form-label">Content</label> 
                    <input type="text" class="form-control" value="{{$post->content}}" name="content" id="exampleInputContent"> 
                </div>
                <div class="input-group mb-3"> 
                    <input type="file" class="form-control" value="{{$post->image}}" name="image" id="inputGroupFile02"> 
                </div>
            </div>
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Update</button> 
            </div>
        </form>
    </div>
</div>
@endsection