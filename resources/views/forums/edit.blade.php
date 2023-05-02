@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('forums.index') }}">Go to Index Page</a>
                <form action="{{ route('forums.update', $forum->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titleInput">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="titleInput" value="{{$forum->title}}">
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="contentInput" rows="3">{{$forum->content}}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Update forum</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
