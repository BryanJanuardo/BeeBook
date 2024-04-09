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
            <form class="book-form" id="book-form" action="#">
                <div class="book-content">
                    <div class="input">
                        <label for="BookTitle">Book Title:</label>
                        <input placeholder="Book Title" name="BookTitle" type="text" required autofocus value="{{ old('BookTitle',$book->BookTitle) }}">
                    </div>
                    <div class="input">
                        <label for="BookPage">Book Page:</label>
                        <input placeholder="Book Page" name="BookPage" type="text" required autofocus value="{{ old('BookPage',$book->BookPage) }}">
                    </div>
                    <div class="input">
                        <label for="BookPrice">Price <span> *Optional: </span></label>
                        <input placeholder="Price" name="BookPrice" type="text" required autofocus value="{{ old('BookPrice',$book->BookPrice) }}">
                    </div>
                    <div class="input">
                        <div class="genre">
                            <label for="BookGenre">Genre:</label>
                            <a href="">Add Genre</a>
                        </div>
                        <div class="genrelist">
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
                        <input placeholder="Author" name="AuthorName" type="text" required autofocus value="{{ old('AuthorName',$book->AuthorName) }}">
                    </div>
                    <div class="input">
                        <label for="AuthorAddress">Author Address:</label>
                        <input placeholder="Author Address" name="AuthorAddress" type="text" required autofocus value="{{ old('AuthorAddress',$book->AuthorAddress) }}">
                    </div>
                    <div class="input">
                        <label for="PublisherName">Publisher:</label>
                        <input placeholder="Publisher" name="PublisherName" type="text" required autofocus value="{{ old('PublisherName',$book->PublisherName) }}">
                    </div>
                    <div class="input">
                        <label for="PublishDate">Publish Date:</label>
                        <input id="dateinput" name="PublishDate" type="date" required autofocus value="{{ old('PublishDate',$book->PublishDate) }}">
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
                <a href="{{route('Detail Book', ['ISBN' => $ISBN])}}"><button id="back-button" class="button">Back</button></a>

            </div>
        </div>
    </div>
    <script>
        var ISBN = {!! $ISBN !!};

        document.getElementById("submit-button").addEventListener('click', function() {
        var newAction = "/EditBook/" + ISBN + "/Post";
        document.getElementById("book-form").setAttribute('action', newAction);
        document.getElementById("book-form").submit();
      });

    </script>
    @endsection

</body>



</html>
