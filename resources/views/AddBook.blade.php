<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="{{ asset('CSS/formaddbook.css') }}">


</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page">
            <div class="page-header">
                <h1>Add Book</h1>
            </div>
            <div class="page-content">
                <form class="book-form" action="{{ route('Post Book') }}" method="post">
                    @csrf
                    <div class="book-content">
                        <div class="input" id="BookTitle">
                            <label for="BookTitle">Book Title:</label>
                            <input placeholder="Book Title" name="BookTitle" type="text">
                        </div>
                        <div class="input" id="BookPage">
                            <label for="BookPage">Book Page:</label>
                            <input placeholder="Book Page" name="BookPage" type="text">
                        </div>
                        <div class="input" id="BookPrice">
                            <label for="BookPrice">Price <span> *Optional: </span></label>
                            <input placeholder="Price" name="BookPrice" type="text">
                        </div>
                        <div class="input" id="BookGenre">
                            <div class="genre">
                                <label for="BookGenre">Genre:</label>
                                <a href="{{ route('Add Genre') }}">Add Genre</a>
                            </div>
                            <div class="genrelist">
                                <!-- buat ambil request ini $variabel = $request->input('genrelist');
                                 $variabel akan menampilkan list genre dalam bentuk array -->
                                @foreach ($genres as $genre)
                                    <a href=""><input name="genrelist[]" value="{{$genre->GenreName}}" type="checkbox">{{$genre->GenreName}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="input" id="BookAuthor">
                            <label for="AuthorName">Author:</label>
                            <input placeholder="Author" name="AuthorName" type="text">
                        </div>
                        <div class="input" id="BookAuthorAddress">
                            <label for="AuthorAddress">Author Address:</label>
                            <input placeholder="Author Address" name="AuthorAddress" type="text">
                        </div>
                        <div class="input" id="BookPublisher">
                            <label for="PublisherName">Publisher:</label>
                            <input placeholder="Publisher" name="PublisherName" type="text">
                        </div>
                        <div class="input" id="BookPublishDate">
                            <label for="PublishDate">Publish Date:</label>
                            <input name="PublishDate" type="date">
                        </div>
                        <div class="input" id="BookPicture">
                            <label for="BookPicture">Book Picture<Picture> <span> *PDF:</span></Picture></label>
                            <input id="file" type="file" name="BookPicture">
                        </div>
                    </div>
                    <div class="error-message"></div>
                    <div class="buttons">
                        <button id="submit-button" class="button" type="submit">Add Book</button>
                    </div>
                </form>
                <div class="buttons">
                    <a href="{{ route('Admin Dashboard') }}"><button id="back-button" class="button">Back</button></a>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
