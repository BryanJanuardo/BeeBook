<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('CSS/navbar.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="{{route('Dashboard')}}" class="logo">BeeBook</a></li>
            <li><a href="" class="link">About</a></li>
            <li><a href="" class="link">Forum</a></li>
            <li><a href="" class="link">Read List</a></li>
            <li><a href="" class="link">Bookmark</a></li>
        </ul>
        <ul>
            <li><a href="" class="link">120 <img src="{{asset('Asset/coin.png')}}" class="coin"></a></li>
            <li><a href=""><img src="{{asset('Asset/united-states.png')}}" class="us"></a></li>
        </ul>

    </nav>
    @yield('PageContent')
</body>
</html>
