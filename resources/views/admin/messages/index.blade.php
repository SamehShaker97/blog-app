@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div x-data="{ open: true }" x-init="setTimeout(() => open = false, 2000)"
            style="position:absolute; bottom:0; right:15px; padding:10px; border-radius:5px;">
            <div x-show="open" class="alert alert-danger" role="alert">
                <div>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="card m-auto col-10">
        <div class="card-header border-0">
            <h3 class="card-title">Messages</h3>
        </div>
        <div class="card-body table-responsive p-0">
            @if ($messages->isEmpty())
                <p class="text-center">No messages found.</p>
            @else
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td> {{ $message->body }} </td>
                                <td> {{ $message->created_at->diffForHumans() }} </td>
                                <td>
                                    <form method="POST" action="{{ route('messages.destroy', $message->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class='bx bx-x'></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
