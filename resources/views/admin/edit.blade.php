@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4 font-weight-bold">Edit User</div>

                    <div class="card-body">
                        <form action="/admin/users/{{$user->id}}" method="post">
                            @method('PATCH')

                            @csrf

                            <div class="form-group font-weight-bold">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" value="{{$user->name}}">
                                <small id="nameHelp" class="form-text text-muted">Enter your name.</small>

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="email">Email Address</label>
                                <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
                                <small id="emailHelp" class="form-text text-muted">Enter your email.</small>

                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold" aria-describedby="roleHelp">Roles
                                <small id="roleHelp" class="form-text text-muted">Give the user one or more roles.</small>

                                    @foreach($roles as $role)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-check-inline">
                                                    <input name="roles[]" class="form-check-input" type="checkbox" value="{{$role->id}}" id="{{$role->name}}"
                                                           @isset($user) @if(in_array($role->id,$user->roles->pluck('id')->toArray())) checked @endif @endisset>
                                                    <label class="form-check-label" for="{{$role->name}}">
                                                        {{$role->name}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                            </div>


                            <a class="btn btn-primary" href="/admin/users" role="button">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
