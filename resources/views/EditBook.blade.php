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

    @section('PopUpEvent')
        <div class="PopUpDeleteBook" id="PopUpDelete">
            <div class="PopUpDeleteBook-content">
                <div class="PopUpDeleteBook-top">
                    <p style="margin-left:min(20px, 6vh);">WARNING!!!</p>
                    <img id="ExitPopUpButton" style="width: min(40px, 10vh); height: min(40px, 10vh)" src="{{asset('Asset/ExitIcon.png')}}" alt="">
                </div>
                <div class="PopUpDeleteBook-bottom">
                    <p>Are you sure you want to delete this book?</p>
                    <p style="font-size: min(12px, 2vh)">(The Deleted Book cannot be recovered!)</p>
                    <div class="PopUpDeleteBook-bottom-button">
                        <button id="CancelPopUpButton">Cancel</button>
                        <button id="ConfirmPopUpButton">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .PopUpDeleteBook{
                display: none;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                z-index: 999;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
            }

            .PopUpDeleteBook-top{
                width: 100%;
                height: min(40px, 8vh);
                background-color: #022B3A;
                display: flex;
                font-size: min(16px, 4vh);
                justify-content: space-between;
                color: white;
                align-items: center;
            }

            .PopUpDeleteBook-bottom{
                display: flex;
                flex-direction: column;
                margin-top: min(60px, 10vh);
                align-items: center;
                width: 100%;
                height: 100%;
            }

            .PopUpDeleteBook-bottom p{
                width: 80%;
                text-align: center;
                font-size: min(24px, 4vh);
                word-wrap: none;
            }

            .PopUpDeleteBook-bottom-button{
                margin-top: min(30px, 6vh);
                display: flex;
                gap: 30px;
            }

            .PopUpDeleteBook-bottom-button button{
                width: min(100px, 20vh);
                height: min(40px, 8vh);
                background-color: #022B3A;
                border: none;
                color: white;
                font-size: min(16px, 4vh);
            }

            .PopUpDeleteBook-content{
                width: min(500px, 80vh);
                height: min(300px, 45vh);
                background-color: #E1E5F2;
            }
        </style>
    @endsection

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
                            @foreach ($genres as $genre)
                                <a href=""><input name="genrelist[]" value="{{$genre->GenreName}}" type="checkbox">{{$genre->GenreName}}</a>
                            @endforeach
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
                    <button id="delete-button" type="button">Delete</button>
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

        // Flow buat Delete: klik delete button form -> Update form action jadi route delete Book ->
        // Muncul Popup -> tombol konfirmasi untuk mengirim / submit form

        document.getElementById("delete-button").addEventListener('click', function() {
            // taro disini route delete book
            document.getElementById("PopUpDelete").style.display = 'flex';
        });

        document.getElementById("ExitPopUpButton").addEventListener('click', function() {
            document.getElementById("book-form").setAttribute('action', "#");
            document.getElementById("PopUpDelete").style.display = 'none';
        });

        document.getElementById("CancelPopUpButton").addEventListener('click', function() {
            document.getElementById("book-form").setAttribute('action', "#");
            document.getElementById("PopUpDelete").style.display = 'none';
        });

        document.getElementById("ConfirmPopUpButton").addEventListener('click', function() {
            document.getElementById("book-form").submit();
        });

    </script>
    @endsection

</body>



</html>
