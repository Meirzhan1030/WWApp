@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div>
                    <a class="btn btn-outline-primary" href="{{ route('forums.index') }}">Go to Index Page</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3>{{$forum->title}}</h3>
                        <p>{{$forum->content}}</p>

                        <a class="btn btn-primary" href="{{route('forums.edit', $forum->id)}}">Edit</a>
                        </div>
                    <h2>Write commentary</h2>
                    <form class="form-control" action="{{ route('comments.store') }}" method="post">
                        @csrf
                        Content: <br><textarea class="form-control" name="content" cols="30" rows="10"></textarea><br>
                        <input class="form-control" name="forum_id" type="hidden" value="{{$forum->id}}">
                        <button class="btn btn-primary" type="submit">Save comment</button>
                    </form>
                    <br><h3>Commentaries:</h3>
                    @foreach($forum->comments as $com)
                        @if($com->forum_id == $forum->id)
                            <p class="text p-lg-2" style="font-family: Tahoma">{{$com->content}}</p>
                            <small>{{$com->updated_at}}</small>
                            @can('update', $com)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#editCommentModal" style="width:100px">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <form action="{{ route('comments.update', $com->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit comment</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="font-family: Arial">Content:</p>
                                                    <textarea class="form-control" name="content" cols="30" rows="10">{{$com->content}}</textarea><br>
                                                    <input class="form-control" name="forum_id" type="hidden" value="{{$com->forum_id}}">
                                                    <p>{{$com->updated_at}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endcan
                            @can('delete', $com)
                                <form class="mt-2" action="{{ route('comments.destroy', $com->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            @endcan
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
