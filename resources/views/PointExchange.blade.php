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
            <form method="POST" action="{{ route('Exchange Point', ['point' => 200]) }}">
                @csrf
                <div class="card">
                    <img class="picture" src="{{ asset('Asset/keychain book.jpg') }}" alt="">
                    <div class="content">
                        <h4 class="title">Book Keychain</h4>
                        <p class="coins">200 Coins</p>
                        <br>
                        <button class="redeem">Redeem</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('Exchange Point', ['point' => 250]) }}">
                @csrf
                <div class="card">
                    <img class="picture" src="{{ asset('Asset/notebook.jpg') }}" alt="">
                    <div class="content">
                        <h4 class="title">Notebook</h4>
                        <p class="coins">250 Coins</p>
                        <br>
                        <button class="redeem">Redeem</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('Exchange Point', ['point' => 100]) }}">
                @csrf
                <div class="card">
                    <img class="picture" src="{{ asset('Asset/totebag.jpg') }}" alt="">
                    <div class="content">
                        <h4 class="title">Totebag</h4>
                        <p class="coins">100 Coins</p>
                        <br>
                        <button class="redeem">Redeem</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('Exchange Point', ['point' => 500]) }}">
                @csrf
                <div class="card">
                    <img class="picture" src="{{ asset('Asset/mug.jpg') }}" alt="">
                    <div class="content">
                        <h4 class="title">Mug</h4>
                        <p class="coins">500 Coins</p>
                        <br>
                        <button class="redeem">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection


</body>

</html>
