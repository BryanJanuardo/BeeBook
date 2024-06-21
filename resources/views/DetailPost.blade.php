<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>

    <link rel="stylesheet" href="{{ asset('CSS/post.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page-header">
            <div class="post-header">
                <div class="post-avatar">
                    <img src="../Asset/indo.png" alt="Avatar" class="avatar-icon">
                </div>
                <div class="post-info">
                    <p class="post-author">{{ $post->user->name }}</p>
                    <p class="post-date">{{$post->created_at}}</p>
                </div>
                <div class="post-actions">
                    <button class="menu-button" onclick="toggleMenu()">•••</button>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <form action="{{ route('Edit Post Page',['post_id' => $post->id]) }}" method="GET">
                            @csrf
                        <button class="edit-button">Edit</button>
                        </form>
                        <form action="{{ route('Delete Post', ['post_id' => $post->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <h1 class="post-title">{{ $post->title }}</h1>
            <p class="post-content">{{ $post->body }}</p>
            <form class="like-form" method="post" action="{{ route('Like Post', ['post_id' => $post->id]) }}">
                @csrf
                <button class="post-likes">{{ $post->like }}</button>
            </form>
        </div>


        <div class="comment-section">
            <h2>Comments</h2>
            @can('user', 'admin')
            <form method="POST" action="/submit-comment/{{$post->id}}">
                @csrf
                <div class="comment-input">
                    <div class="comment-avatar-input">
                        <img src="../Asset/indo.png" alt="Avatar" class="avatar-icon">
                    </div>
                    <textarea name="Body" placeholder="Write a comment..."></textarea>
                    <button class="comment-submit">➤</button>
                </div>
            </form>
            @endcan
            @foreach ($comments as $comment)
            <div class="comment">
                <div class="comment-header">
                    <div class="comment-avatar">
                        <img src="../Asset/indo.png" alt="Avatar" class="avatar-icon">
                    </div>
                    <div class="comment-info">
                        <p class="comment-author">{{$comment->user->name}}</p>
                        <p class="comment-date">{{$comment->created_at}}</p>
                    </div>
                    @if ($comment->user->id == Auth::user()->id)
                    <div class="comment-actions">
                        <button class="menu-button" onclick="toggleCommentMenu()">•••</button>
                        <div class="dropdown-menu" id="dropdownMenuComment">
                            <button class="edit-button" onclick="toggleCommentEdit()">Edit</button>
                            <form action="{{ route('Delete Comment', ['comment_id' => $comment->id]) }}" method="POST">
                                @csrf
                                <button class="delete-button" >Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                <p class="comment-content" id="commentContent">{{$comment->body}}</p>
                <form method="POST" action="/edit-comment/{{$comment->id}}">
                    @csrf
                    <div class="comment-edit-input" id="commentEdit">
                        <textarea name="Body">{{$comment->body}}</textarea>
                        <button class="comment-submit">➤</button>
                    </div>
                </form>
                <form class="like-form" method='POST' action='{{ route('Like Comment', ['comment_id' => $comment->id]) }}'>
                    @csrf
                    <button class="comment-likes">{{$comment->like}}</button>
                </form>
            </div>
            @endforeach
        </div>

    @endsection


    <script>
        function toggleMenu() {
            var menu = document.getElementById('dropdownMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        function toggleCommentMenu() {
            var menu = document.getElementById('dropdownMenuComment');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        function toggleCommentEdit() {
            var menu = document.getElementById('commentEdit');
            var comment = document.getElementById('commentContent');
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
            comment.style.display = comment.style.display === 'none' ? 'flex' : 'none';
        }

        window.onclick = function(event) {
            if (!event.target.matches('.edit-button')) {

                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }

            if (!event.target.matches('.menu-button')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>


</html>
