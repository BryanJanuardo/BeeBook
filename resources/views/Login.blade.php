<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('CSS/login.css') }}>
</head>

<body>
    <div class="container">
        <div class="signin-section">
            <h2>Login</h2>
            <form action="{{ route('Authenticate') }}" method="POST">
                @csrf
                <input type="text" placeholder="Email" name="Email" class="input-field" value="{{ old('Email') }}">
                @error('Email')
                    <div>{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Password" name="Password" class="input-field">
                @error('Password')
                    <div>{{ $message }}</div>
                @enderror
                @if (session()->has('loginFailed'))
                    <div>{{ session('loginFailed') }}</div>
                @endif
                <button type="submit" class="signin-button">Sign In</button>
            </form>
        </div>
        <div class="signup-section">
            <h2>New Here?</h2>
            <p>Be part of us and read new <br> books everyday!</p>
            <button class="signup-button">Sign Up</button>
        </div>
    </div>


</body>

</html>
