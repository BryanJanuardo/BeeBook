<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>

    <link rel="stylesheet" href="{{ asset('CSS/forum.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="page-header">
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
                        <h4 class="post-title">Judul Post</h4>
                        <p class="post-owner">By "Pengarang"</p>
                        <p class="post-body">Lorem ipsum, dolor sit amet consectetur adipisicing elit. In optio nemo, atque praesentium asperiores et rem officia nobis sed fugiat. Totam ea accusamus alias temporibus assumenda, maiores veniam vitae explicabo porro quod architecto consectetur optio quaerat natus nulla molestiae, consequuntur illo ullam accusantium dolorem inventore? At cum officiis nam neque.</p>
                    </div>
                </button>
            </form>

        </div>
    @endsection


</body>

</html>
