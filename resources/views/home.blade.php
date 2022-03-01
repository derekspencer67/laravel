@extends('layouts.app')

@section('content')
  <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header text-center"><h2>Welcome to the Media Feed</h2></div>
                    @if(Auth::check())
                        <a href="/posts/create" class="btn btn-outline-success">Create New Post</a>
                        @endif

                    <div class="card-body bg-light font-weight-bold">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('deny'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('deny') }}
                            </div>
                        @endif
                        <div class="card">
                        @foreach($posts as $post)
                            <div class="card-body text-center font-weight-bold" id="{{$post->id}} name="{{$post->title}}">

                                <div>Posted at {{$post->created_at}} by {{$post->name}}</div><br>

                                <div class="card bg-light"><h2>{{$post->title}}</h2></div><br>
                                <div class="card"><img class="img-fluid" src="{{$post->img_url}}"/></div><br>
                                <div><h3>{{$post->content}}</h3></div>
                            @if($post->ext_web_link)
                                <div><a href="{{$post->ext_web_link}}" target="_blank">View more...</a></div>
                            @endif
                            </div>
                            <div class="btn-group">
                            @if(Auth::id() === $post->created_by)

                            <a class="btn btn-warning" href="/posts/{{$post->id}}/edit">Edit</a>
                                @endif
                                @if(Auth::check())
                                @foreach($userRoles as $userRole)
                                @if(Auth::id() === $post->created_by || $userRole->id === $modId )
                                    <form action="/posts/{{$post->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                            @break
                                @endif
                                @endforeach
                                    @if(Auth::id() === $post->created_by && Auth::user()->roles->first() === null)
                                        <form action="/posts/{{$post->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                    @endif
                                </div>
                            </div><br>
                            <div class="card">
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
