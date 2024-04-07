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

        <div class="page-content" action="">
            @for ($i = 0; $i < 12; $i++)
                <form action="{{route('Detail Book', ['ISBN' => '1'])}}">
                    <button class="book-card">
                        <img class="book-picture" src="./storage/Book/SCC2.png" alt="">
                        <div class="book-content">
                            <h4 class="book-title">Psychology of Money</h4>
                            <p class="book-author">Morgan Housel</p>
                            <p class="book-price">Rp. 10.000</p>
                        </div>
                    </button>
                </form>
            @endfor
        </div>
    @endsection


</body>

</html>
