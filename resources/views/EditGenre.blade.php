<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
    <link rel="stylesheet" href="{{asset("/CSS/formeditgenre.css")}}">
</head>
<body>

    @extends('Layout')

    @section('PageContent')

    <div class="form-container">
        <h1>Edit / Delete Genre</h1>
        <form action="#">
            <div class="input-box">
                <label for="genre">Current Genre: <span style="font-weight: bold;"> {{$genre->GenreName}}</span></label>
                <input placeholder="Genre" id="Genre" name="Genre" type="text"><br><br>
            </div>
            <div class="button-box">
                <button type="submit" >Edit Genre</button>
                <button>Delete Genre</button>
            </div>
            <br>
        </form>

        <a href=""><button id="back-button" class="button">Back</button></a>
    </div>
    @endsection
</body>
</html>
