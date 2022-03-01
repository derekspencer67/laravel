@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="font-weight-bold">Manage Themes</h3></div>

                    <a href="/themes/create" class="btn btn-outline-success">Add New Theme</a>
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
                                <th scope="col">ThemeId</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($themes as $theme)
                                <tr>
                                    <td class="font-weight-bold">{{ $theme->id }}</td>
                                    <td class="font-weight-bold">{{ $theme->name }}</td>
                                    <td class="font-weight-bold"></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-md btn-success" href="/themes/{{$theme->id}}" role="button">Show</a>
                                            <a class="btn btn-warning" href="/themes/{{$theme->id}}/edit" role="button">Edit</a>
                                            <form action="/themes/{{$theme->id}}" method="post">
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
