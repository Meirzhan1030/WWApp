<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
        <a href="{{ route('forums.index') }}">Go to Index Page</a>

        <form action="{{ route('forums.update', $forum->id) }}" method="post">
            @csrf
            @method('PUT')
            Title: <input type="text" name="title" value="{{$forum->title}}"><br>
            Content: <textarea name="content" cols="30" rows="10">{{$forum->content}}</textarea>
            <button type="submit">Update forum</button>
        </form>
    </body>
</html>
