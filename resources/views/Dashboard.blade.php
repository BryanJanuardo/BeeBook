<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                <div class="genre-list">
                    <button id="all-genre-content" class="genre-content">All</button>
                    <button class="genre-content">Fiction</button>
                    <button class="genre-content">Non-Fiction</button>
                </div>
            </form>
            <div>
                <form class="search-box" action="">
                    <input class="search" placeholder="Search" type="text">
                    <div class="filter-menu">
                        <img src="../storage/others/filter.png" class="filter-icon">
                        <ul class="filter-dropdown">
                            <li>
                                <input class="left" type="checkbox" name="genre" id="action">
                                <label class="right" for="action"> Action</label>
                            </li>
                            <li>
                                <input class="left" type="checkbox" name="genre" id="comedy">
                                <label class="right" for="comedy"> Comedy</label>
                            </li>
                            <li>
                                <input class="left" type="checkbox" name="genre" id="horror">
                                <label class="right" for="horror"> Horror</label>
                            </li>
                        </ul>
                    </div>
                </form>

            </div>
        </div>

        <div class="page-content">
            @foreach ($getAllBook as $book)
                <form action="{{ route('Detail Book', ['ISBN' => $book->ISBN]) }}">
                    <button class="book-card">
                        <img class="book-picture" src="../storage/Book/BookPicture/images.jpeg" alt="">
                        <div class="book-content">
                            <h4 class="book-title">{{ $book->BookTitle }}</h4>
                            <p class="book-author">{{ $book->AuthorName }}</p>
                            <p class="book-price">Rp. {{ $book->BookPrice }}</p>
                        </div>
                    </button>
                </form>
            @endforeach
        </div>
    @endsection


</body>

</html>
