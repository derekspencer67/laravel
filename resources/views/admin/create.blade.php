@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4 font-weight-bold">Add Admin User</div>

                    <div class="card-body">
                        <form action="/admin/users" method="post">

                            @csrf

                            <div class="form-group font-weight-bold">
                                <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                    <small id="nameHelp" class="form-text text-muted">Enter your name.</small>

                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="email">Email Address</label>
                                    <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                    <small id="emailHelp" class="form-text text-muted">Enter your email.</small>

                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passHelp" name="password" required autocomplete="new-password" placeholder="Enter Password">
                                    <small id="passHelp" class="form-text text-muted">Enter your password.</small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" aria-describedby="confirmHelp" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Password">
                                    <small id="confirmHelp" class="form-text text-muted">Re-enter your password.</small>

                            </div>

                            <div class="form-group font-weight-bold" aria-describedby="roleHelp">Roles
                                <small id="roleHelp" class="form-text text-muted">Give the user one or more roles.</small>

                                @foreach($roles as $role)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check-inline">
                                                <input name="roles[]" class="form-check-input" type="checkbox" value="{{$role->id}}" id="{{$role->name}}">
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
