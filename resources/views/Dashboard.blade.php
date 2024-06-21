<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{asset('CSS/dashboard.css')}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>
<body>
    @extends('Layout')

    @section('PageContent')
    <div class="page-header">
        <form action="">
            @can('admin')
                <div>
                    <div style="display: flex;"><a href="{{ route('Add Book') }}" class="link" id="admin-button">Add Book</a></div>
                </div>
            @endcan
        </form>
        <div>
            <form style="display: flex; flex-direction: row;" class="search-box" action="{{route ('Filter Book')}}" method="POST">
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

    <div class="page-content">
        @foreach ($getAllBook as $book)
            <form action="{{route('Detail Book', ['ISBN' => $book->ISBN])}}">
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
<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        const dropdowns = document.getElementById('genredropdown');
        const dropdownTrigger = document.getElementById('dropdownButton');
        dropdownTrigger.addEventListener('click', () => {
            dropdowns.style.display = dropdowns.style.display === 'flex' ? 'none' : 'flex';
        });
    });
</script>
</html>
