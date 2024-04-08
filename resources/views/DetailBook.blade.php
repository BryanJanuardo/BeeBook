<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Book</title>

    <link rel="stylesheet" href="{{asset("/CSS/detailbook.css")}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="detail-container">
            <div class="left">
                <img class="book" src="{{asset("Asset/Image.png")}}" alt="">
            </div>

            <div class="right">
                <h1 class="title">Psychology of Money</h1>
                <p class="author"><strong>By</strong> Morgan Housel</p>
                <h3 class="rating">4.5/10</h3>
                <p class="desc">Timeless lessons on wealth, greed, and happiness</p>
                <button class="read-now">Read Now!</button>
            </div>
        </div>

        <hr>

        <div class="rating-container">
            <h2>Rating</h2>
            <div class="rating-send">
                <input type="number" />
                <button>Send</button>
            </div>
        </div>

        <div class="comment-container">
            <h2>Comments</h2>
            <div class="comment-send">
                <input type="text" placeholder="Put your comments here..." />
                <button>Send</button>
            </div>
        </div>

        <div class="cards">
            @for ($i = 0; $i < 5; $i++)
                <div class="card">
                    <h3>Budi</h3>
                    <p>Bukunya kerenn, udah pernah beli bukunya tapi yang versi bahasa jawa</p>
                </div>
            @endfor
        </div>
        @endsection


</body>

</html>