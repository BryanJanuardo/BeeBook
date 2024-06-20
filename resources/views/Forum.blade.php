<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{asset('CSS/dashboard.css')}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>
<body>
    @extends('Layout')

    @section('PageContent')
    <div class="page-header">
        <form action="">
            <div class="genre-list">
                <button id="all-genre-content" class="genre-content">All</button>
                <button class="genre-content">Fiction</button>
                <button class="genre-content">Non-Fiction</button>
            </div>
        </form>
        <div>
            <form class="search-box" action="">
                <input placeholder="Search" type="text">
            </form>
        </div>
    </div>

    <div class="page-content">

        <form action="">
            <button class="post-card">
                <div class="post-content">
                    <h4 class="post-title"></h4>
                    <p class="post-owner"></p>
                    <p class="post-content"></p>
                </div>
            </button>
        </form>

    </div>
    @endsection


</body>
</html>
