<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page-header">
            <form action="">
                <div>
                    <div style="display: flex;"><a href="{{ route('Add Book') }}" class="link" id="admin-button">Add Book</a></div>
                </div>
                <div class="genre-list">
                    <button id="all-genre-content" class="genre-content">All</button>
                    <button class="genre-content">Fiction</button>
                    <button class="genre-content">Non-Fiction</button>
                </div>
            </form>
            <div>
                <form class="search-box" action="">
                    <input placeholder="Search" type="text">
                </form>
            </div>
        </div>

        <div class="page-content">
            @foreach ($getAllBook as $book)
                <form action="{{route('Detail Book', ['ISBN' => $book->ISBN])}}">
                    <button class="book-card">
                        <img class="book-picture" src="./storage/Book/BookPicture/{{ $book->BookPicture }}" alt="">
                        <div class="book-content">
                            <h4 class="book-title">{{ $book->BookTitle }}</h4>
                            <p class="book-author">{{ $book->AuthorName }}</p>
                            <p class="book-price">{{ $book->BookPrice }}</p>
                        </div>
                    </button>
                </form>
            @endforeach
        </div>
    @endsection


</body>

</html>
