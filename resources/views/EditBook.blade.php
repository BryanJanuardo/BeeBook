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
            <form class="book-form" action="">
                <div class="book-content">
                    <div class="input">
                        <label for="BookTitle">Book Title:</label>
                        <input placeholder="Book Title" name="BookTitle" type="text">
                    </div>
                    <div class="input">
                        <label for="BookPage">Book Page:</label>
                        <input placeholder="Book Page" name="BookPage" type="text">
                    </div>
                    <div class="input">
                        <label for="BookPrice">Price <span> *Optional: </span></label>
                        <input placeholder="Price" name="BookPrice" type="text">
                    </div>
                    <div class="input">
                        <div class="genre">
                            <label for="BookGenre">Genre:</label>
                            <a href="">Add Genre</a>
                        </div>
                        <div class="genrelist">
                            <!-- buat ambil request ini $variabel = $request->input('genrelist');
                                 $variabel akan menampilkan list genre dalam bentuk array -->
                                 @foreach ($genres as $genre)
                                 <a href="{{route('Edit Genre', ['id' => $genre->id])}}"><input name="genrelist[]" value="{{$genre->GenreName}}" type="checkbox">{{$genre->GenreName}}</a>
                             @endforeach
                        </div>
                    </div>
                    <div class="input">
                        <label for="AuthorName">Author:</label>
                        <input placeholder="Author" name="AuthorName" type="text">
                    </div>
                    <div class="input">
                        <label for="AuthorAddress">Author Address:</label>
                        <input placeholder="Author Address" name="AuthorAddress" type="text">
                    </div>
                    <div class="input">
                        <label for="PublisherName">Publisher:</label>
                        <input placeholder="Publisher" name="PublisherName" type="text">
                    </div>
                    <div class="input">
                        <label for="PublishDate">Publish Date:</label>
                        <input id="dateinput" name="PublishDate" type="date">
                    </div>
                    <div class="input">
                        <label for="BookPicture">Book Picture<Picture> <span> *PDF:</span></Picture></label>
                        <input id="file" type="file">
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
