<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
</body>
</html>
<!-- must remove the comment below, the error because php still detect inside the html comment lol-->

<!-- 
this is for future refereence
@fore ach ($post s as $post)
    <div>
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p>{{ $post->content }}</p>
    </div>
@endfo reach -->