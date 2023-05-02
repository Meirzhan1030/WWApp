@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('forums.index') }}">Go to Index Page</a>
                <form action="{{ route('forums.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="titleInput" placeholder="Enter title">
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="contentInput" rows="3" placeholder="Enter content"></textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary mt-2" type="submit">Save forum</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
