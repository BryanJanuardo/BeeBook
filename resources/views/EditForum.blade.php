<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
    <link rel="stylesheet" href="{{asset('CSS/formaddforum.css')}}">
</head>


<body>

    @extends('Layout')
    @section('PageContent')

    <div class="form-container">
        <h1>Edit Post</h1>
        <form method="POST" action="{{ route('Edit Post', ['post_id' => $post->id]) }}">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value={{ $post->title }} required >

            <label for="body">Body</label>
            <textarea id="body" name="body" rows="5" value={{ $post->body }} required></textarea>

            <button type="submit">Submit</button>
        </form>
        <a href="{{route('Dashboard')}}"><button id="back-button" class="button">Back</button></a>
    </div>

    @endsection
</body>
</html>