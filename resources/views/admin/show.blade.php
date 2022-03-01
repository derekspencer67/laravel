@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <strong>Name</strong>
                            <p>{{$user->name}}</p>

                            <strong>Email</strong>
                            <p>{{$user->email}}</p>

                            <strong>Current Roles:</strong>
                            <ul>
                                @foreach($user->roles as $role)
                                <li>{{$role->name}}</li>
                                @endforeach
                            </ul>

                            <div class="btn-group">
                                <a class="btn btn-primary" href="/admin/users">Back to Users List</a>

                                <a class="btn btn-warning" href="/admin/users/{{$user->id}}/edit">Edit</a>


                                <form action="/admin/users/{{$user->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
