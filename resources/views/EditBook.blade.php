<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="{{asset("/CSS/formeditbook.css")}}">

</head>
<body>

    @extends('Layout')

    @section('PageContent')

    <div class="page">
        <div class="page-header">
            <h1>Edit / Delete Book</h1>
        </div>
        <div class="page-content">
            <form class="book-form" action="/EditData/{{ $book -> id}}" id = "bookForm">
                @method('patch')
                @csrf
                <div class="book-content">
                    <div class="input">
                        <label for="BookTitle">Book Title:</label>
                        <input placeholder="Book Title" name="BookTitle" id="BookTitle" type="text" required autofocus value="{{ old('title', $book->title) }}">
                    </div>
                    <div class="input">
                        <label for="BookPage">Book Page:</label>
                        <input placeholder="Book Page" name="BookPage" id="BookPage" type="text" required autofocus value="{{ old('page', $book->page) }}">
                    </div>
                    <div class="input">
                        <label for="BookPrice">Price <span> *Optional: </span></label>
                        <input placeholder="Price" name="BookPrice" id="BookPrice" type="text" required autofocus value="{{ old('price', $book->price) }}">
                    </div>
                    <div class="input">
                        <div class="genre">
                            <label for="BookGenre">Genre:</label>
                            <a href="">Add Genre</a>
                        </div>
                        <div class="genrelist" id="genrelist">
                            <!-- buat ambil request ini $variabel = $request->input('genrelist');
                                 $variabel akan menampilkan list genre dalam bentuk array -->
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                            <a href=""><input name="genrelist[]" value="Fiction" type="checkbox">Fiction</a>
                        </div>
                    </div>
                    <div class="input">
                        <label for="AuthorName">Author:</label>
                        <input placeholder="Author" name="AuthorName" id="AuthorName" type="text" required autofocus value="{{ old('author', $book->author) }}">
                    </div>
                    <div class="input">
                        <label for="AuthorAddress">Author Address:</label>
                        <input placeholder="Author Address" name="AuthorAddress" id="AuthorAddress" type="text" required autofocus value="{{ old('address', $book->address) }}">
                    </div>
                    <div class="input">
                        <label for="PublisherName">Publisher:</label>
                        <input placeholder="Publisher" name="PublisherName" id="PublisherName" type="text" required autofocus value="{{ old('publisher', $book->publisher) }}">
                    </div>
                    <div class="input">
                        <label for="PublishDate">Publish Date:</label>
                        <input id="dateinput" name="PublishDate" type="date" required autofocus value="{{ old('date', $book->date) }}">
                    </div>
                    <div class="input">
                        <label for="BookPicture">Book Picture<Picture> <span> *PDF:</span></Picture></label>
                        <input id="file" type="file" name="BookPicture">
                    </div>
                </div>
                <div class="error-message"></div>
                <div class="buttons">
                    <button id="submit-button" class="button" type="submit">Submit</button>
                    <button>Delete</button>
                </div>
            </form>
            <div class="buttons">
                <a href=""><button id="back-button" class="button">Back</button></a>

            </div>
        </div>
    </div>
    @endsection

</body>

</html>
