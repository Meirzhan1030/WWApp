<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
        <div>
            <a href="{{ route('forums.index') }}">Go to Index Page</a>
        </div>
        <h3>{{$forum->title}}</h3>
        <p>{{$forum->content}}</p>

        <a href="{{route('forums.edit', $forum->id)}}">Edit</a>
    </body>
</html>
