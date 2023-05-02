@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <a class="btn btn-outline-primary" href="{{ route('forums.create') }}">Go to Create Page</a>
            @foreach($forums as $forum)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$forum->title}}</h5><small>author: {{$forum->user->name}}</small><br>
                            <a href="{{route('forums.show', $forum->id)}}" class="btn btn-primary">Read more</a>
                            @can('delete', $forum)
                                <form action="{{route('forums.destroy', $forum->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete!</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection





