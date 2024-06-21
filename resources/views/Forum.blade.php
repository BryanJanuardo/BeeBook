<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>

    <link rel="stylesheet" href="{{ asset('CSS/forum.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page-header">
            <div>
                <form class="search-box" action="">
                    <input placeholder="Search" type="text">
                </form>
            </div>
        </div>

        <div class="create-post">
            <div style="display: flex;"><a href="{{ route('Add Forum') }}" class="link" id="admin-button">Create Post</a></div>
        </div>

        <div class="page-content">
            @foreach ($getAllPost as $post)
                <form action="">
                    <button class="post-card">
                        <div class="post-content">
                            <h4 class="post-title">{{$post->title}}</h4>
                            <p class="post-owner">{{ $getAllUser[$post->user_id]->name }}</p>
                            <p class="post-body">{{$post->body}}</p>
                        </div>
                    </button>
                </form>
            @endforeach
        </div>
    @endsection


</body>

</html>
