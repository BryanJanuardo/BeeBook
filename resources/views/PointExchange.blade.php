<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('CSS/pointexchange.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page-content">
            <div class="card">
                <img class="picture" src="../storage/Book/BookPicture/images.jpeg" alt="">
                <div class="content">
                    <h4 class="title">Book Keychain</h4>
                    <p class="coins">200 Coins</p>
                    <br>
                    <button class="redeem">Redeem</button>
                </div>
            </div>

            <div class="card">
                <img class="picture" src="../storage/Book/BookPicture/images.jpeg" alt="">
                <div class="content">
                    <h4 class="title">Notebok</h4>
                    <p class="coins">250 Coins</p>
                    <br>
                    <button class="redeem">Redeem</button>
                </div>
            </div>

            <div class="card">
                <img class="picture" src="../storage/Book/BookPicture/images.jpeg" alt="">
                <div class="content">
                    <h4 class="title">Totebag</h4>
                    <p class="coins">100 Coins</p>
                    <br>
                    <button class="redeem">Redeem</button>
                </div>
            </div>

            <div class="card">
                <img class="picture" src="../storage/Book/BookPicture/images.jpeg" alt="">
                <div class="content">
                    <h4 class="title">Mug</h4>
                    <p class="coins">500 Coins</p>
                    <br>
                    <button class="redeem">Redeem</button>
                </div>
            </div>
        </div>
    @endsection


</body>

</html>
