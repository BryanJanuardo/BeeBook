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
        @auth
        <ul>
            <li><a href="{{route('Dashboard')}}" class="logo">BeeBook</a></li>
            <li><a href="{{route('About Us')}}" class="link">About</a></li>
            <li><a href="" class="link">Forum</a></li>
            <li><a href="" class="link">Read List</a></li>
            <li><a href="" class="link">Bookmark</a></li>
        </ul>
        <ul>
            <a href="" class="link"><li>120 <img src="{{asset('Asset/coin.png')}}" class="coin"></li></a>
            <div class="lang-menu">
                <div class="selected-lang">
                    English
                </div>
                <ul>
                    <li>
                        <a href="#" class="us"> English</a>
                    </li>
                    <li>
                        <a href="#" class="id"> Indonesia</a>
                    </li>
                </ul>
            </div>
            <div class="user-menu">
                <div class="selected-user">
                    Welcome! {{auth()->user()->name}}
                </div>
                <ul>
                    <li>
                        <form action="{{route('Logout')}}" method="POST">
                            @csrf
                            <button class="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </ul>
        @else
        <ul>
            <li><a href="{{route('Dashboard')}}" class="logo">BeeBook</a></li>
            <li><a href="{{route('About Us')}}" class="link">About</a></li>
        </ul>
        <ul>
            <div class="lang-menu">
                <div class="selected-lang">
                    English
                </div>
                <ul>
                    <li>
                        <a href="#" class="us"> English</a>
                    </li>
                    <li>
                        <a href="#" class="id"> Indonesia</a>
                    </li>
                </ul>
            </div>
            <a href="{{route('Login')}}" class="link"><li>Login</li></a>

        </ul>
        @endauth


    </nav>

    @yield('PopUpEvent')

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
