@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4 font-weight-bold">Create New Post</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif(session('deny'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('deny') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="/posts" method="post">

                            @csrf

                            <div class="form-group font-weight-bold">
                                <label for="title">Post Title</label>
                                <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="(Required) Enter post title">

                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="content">Content</label>
                                <textarea name="content" rows="4" class="form-control" id="content" placeholder="(Required) Enter content">{{ old('content') }}</textarea>

                                @error('content')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="img_url">Image URL</label>
                                <input id="img_url" type="url" class="form-control" name="img_url" value="{{ old('img_url') }}" placeholder="(Optional) Enter image URL">


                                @error('img_url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="ext_web_link">External Web Link</label>
                                <input id="ext_web_link" type="text" class="form-control"name="ext_web_link" value="{{ old('ext_web_link') }}" placeholder="(Optional)Enter link to external web page">


                            @error('ext_web_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>

                            <input id="created_by" type="hidden" name="created_by" value="{{Auth::id()}}">

                            <a class="btn btn-primary" href="/" role="button">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
