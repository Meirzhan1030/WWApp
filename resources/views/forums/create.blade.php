<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
        <a href="{{ route('forums.index') }}">Go to Index Page</a>

        <form action="{{ route('forums.store') }}" method="post">
            @csrf
            Title: <input type="text" name="title"><br>
            Content: <textarea name="content" cols="30" rows="10"></textarea>
            <button type="submit">Save forum</button>
        </form>
    </body>
</html>
