<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('CSS/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('Css/footer.css')}}">
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

    <footer class="footer">
        <div class="footer-top">
            <p>&copy;2024-2024 BeeBook and any associated logos are trademarks, service marks, and/or registered trademarks of Team 11.</p>
        </div>

        <div class="footer-bottom">
            <div class="footer-col">
                <h2>Contact Us</h2>
                <p>Jl. Raya Kb. Jeruk No.27, RT.1/RW.9, Kemanggisan, Kec.</p>
                <p>Palmerah, Kota Jakarta Barat, Daerah Khusus </p>
                <p>Ibukota Jakarta 11530</p>
            </div>
            <div class="footer-col">
                <br>
                <p>customersupport@beebook.co / 02139393923</p>
            </div>
        </div>
    </footer>

</body>
</html>
