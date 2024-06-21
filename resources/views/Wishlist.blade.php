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
                <div>
                    <form style="display: flex; flex-direction: row;" class="search-box" action="{{route ('Filter Read List')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="genre-list">
                            <img src="{{asset('Asset/Filter.png')}}" id="dropdownButton" alt="">
                            <div id="genredropdown" class="dropdown-genre-list">
                                @foreach ($genres as $genre)
                                    <div class="genre"><input name="genresearchlist[]" value="{{ $genre->id }}" type="checkbox"><label for="">{{ $genre->GenreName }}</label></div>
                                @endforeach

                            </div>
                        </div>
                        <input placeholder="Search" value="" name="searchquery" type="text">
                        <button type="submit" class="search-button"><img class="" src="{{asset('Asset/search.png')}}" alt=""></button>
                    </form>
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

            const dropdowns = document.getElementById('genredropdown');
            const dropdownTrigger = document.getElementById('dropdownButton');
            dropdownTrigger.addEventListener('click', () => {
                dropdowns.style.display = dropdowns.style.display === 'flex' ? 'none' : 'flex';
            });
        });
    </script>

</body>

</html>
