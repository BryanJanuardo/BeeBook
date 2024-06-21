<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>

    <link rel="stylesheet" href="{{ asset('CSS/wishlist.css') }}">
</head>

<body>
    @extends('Layout')
    @section('PageContent')
        <div class="container">
            <div class="wishlist-controls">
                <div class="filter-container">
                    <div class="filter-button" id="filter-button">
                        <img class="filter-icon" src="{{ asset('Asset/filter.png') }}" alt="Filter Icon">
                    </div>
                </div>
                <div class="filter-options" id="filter-options">
                    <label for="sort">Sort by Alphabet</label>
                    <div class="option">
                        <input type="checkbox" id="sort-asc" name="sort" value="asc"> Ascending
                    </div>
                    <div class="option">
                        <input type="checkbox" id="sort-desc" name="sort" value="desc"> Descending
                    </div>
                </div>
            </div>
            <div class="wishlist-section">
                @foreach ($wishlists as $wishlist)
                    <div class="wishlist-item">
                        <img class="book-picture" src="{{ asset('storage/Book/BookPicture/images.jpeg') }}" alt="">
                        <h2>{{ $wishlist->book->BookTitle }}</h2>
                        <a href="{{ route('Detail Book', ['ISBN' => $wishlist->book->ISBN]) }}" class="btn btn-primary">Read Now</a>
                        <form action="{{ route('Delete Read List', ['ISBN' => $wishlist->book->ISBN]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButton = document.getElementById('filter-button');
            if (filterButton) {
                filterButton.addEventListener('click', function () {
                    const filterOptions = document.getElementById('filter-options');
                    if (filterOptions) {
                        filterOptions.classList.toggle('show');
                    }
                });
            }
        });
    </script>
</body>

</html>
