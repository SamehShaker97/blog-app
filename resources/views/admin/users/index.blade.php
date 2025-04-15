@extends('layouts.admin')
@section('content')
<div class="card m-auto col-6">
    <div class="card-header border-0">
        <h3 class="card-title">Users</h3>
    </div>
    <div class="card-body table-responsive p-0">
        @if($users->isEmpty())
        <p class="text-center">No users found.</p>
        @else
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td> {{$user->email}}</td>
                    <td>
                        <div class="d-flex">
                            <form action="{{route('users.destroy' , $user->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> 
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection