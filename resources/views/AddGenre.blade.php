<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Genre</title>
    <link rel="stylesheet" href="{{asset('CSS/formaddgenre.css')}}">
</head>


<body>

    @extends('Layout')
    @section('PageContent')

    <div class="form-container">
        <h1>Add Genre</h1>
        <form action="/AddGenre" method="POST">
            @csrf
            <div class="input-box">

                <label for="GenreName">Genre:</label>
                <input placeholder="Name" id="GenreName" name="GenreName" type="text"><br><br>



            </div>
            <button type="submit" >Add Genre</button>
            <br>
        </form>

        <a href="{{route('Dashboard')}}"><button id="back-button" class="button">Back</button></a>
    </div>

    @endsection
</body>
</html>
