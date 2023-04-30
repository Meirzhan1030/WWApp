<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
        <a href="{{ route('forums.create') }}">Go to Create Page</a>
        @foreach($forums as $forum)
            <a href="{{route('forums.show', $forum->id)}}"><h3>{{$forum->title}}</h3></a>

            <form action="{{route('forums.destroy', $forum->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete!</button>
            </form>
        @endforeach
    </body>
</html>
