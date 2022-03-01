@extends('layouts.app')

@section('content')
    <link rel="stylesheet" {{  $cookie }} crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4 font-weight-bold">Create New Theme</div>

                    <div class="card-body">
                        <form action="/themes" method="post">

                            @csrf

                            <div class="form-group font-weight-bold">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Enter Theme Name.</small>

                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bold">
                                <label for="cdn_url">CDN Url</label>
                                <input name="cdn_url" type="text" class="form-control" id="cdn_url" aria-describedby="cdnHelp" placeholder="Enter CDN Url">
                                <small id="cdnHelp" class="form-text text-muted">Enter the CDN Url.</small>

                                @error('cdn_url')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input id="created_by" type="hidden" name="created_by" value="{{Auth::id()}}">

                            <a class="btn btn-primary" href="/themes" role="button">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
