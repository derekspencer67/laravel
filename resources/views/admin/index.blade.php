@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="font-weight-bold">User Administration</h3></div>

                    <a href="/admin/users/create" class="btn btn-outline-success">Create New Admin User</a>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('deny'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('deny') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="font-weight-bold">{{ $user->name }}</td>
                                            <td class="font-weight-bold">{{ $user->email }}</td>
                                            <td class="font-weight-bold">
                                        @foreach($user->roles as $role)
                                                <li>{{ $role->name }}</li>
                                        @endforeach
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-md btn-success" href="/admin/users/{{$user->id}}" role="button">Show</a>
                                                    <a class="btn btn-warning" href="/admin/users/{{$user->id}}/edit" role="button">Edit</a>
                                                    <form action="/admin/users/{{$user->id}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
