@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Theme Details for {{ $theme->name }}</h4></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <strong>Name</strong>
                        <p>{{$theme->name}}</p>

                        <strong>CDN Url</strong>
                        <p>{{$theme->cdn_url}}</p>

                        <div class="btn-group">
                            <a class="btn btn-primary " href="/themes">Back to Themes</a>

                            <a class="btn btn-warning" href="/themes/{{$theme->id}}/edit">Edit</a>


                            <form action="/themes/{{$theme->id}}" method="post">
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
