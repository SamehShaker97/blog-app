@extends('layouts.user')
@section('content')
<div class="col-lg-6 m-auto">
    <div class="card card-primary card-outline mt-5">
    @if(session('success'))
    <div x-data="{open:true}" x-init="setTimeout(()=> open = false , 2000)">
        <div x-show="open" class="alert alert-success" role="alert">
            <div>
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif
        <div class="card-header">
            <div class="card-title">Create Post</div>
        </div>
        <form form method="POST" action="{{route('user_post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3"> 
                    <label for="exampleInputTitle" class="form-label">Title</label> 
                    <input type="text" class="form-control" name="title" id="exampleInputTitle">
                </div>
                <div class="mb-3"> 
                    <label for="exampleInputContent" class="form-label">Content</label> 
                    <input type="text" class="form-control" name="content" id="exampleInputContent"> 
                </div>
                <div class="input-group mb-3"> 
                    <input type="file" class="form-control" name="image" id="inputGroupFile02"> 
                </div>
            </div>
            <div class="card-footer"> 
                <button type="submit" class="btn btn-primary">Create</button> 
            </div>
        </form>
    </div>
</div>
@endsection