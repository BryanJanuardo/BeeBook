<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('CSS/register.css') }}>
</head>
<body>
    @extends('Layout')

    @section('PageContent')
    <div class="container">
        <div class="login-section">
            <h2>Joined?</h2>
            <p>Read is my middle name!</p>
            <a href="{{ route('Login') }}"><button class="login-button">Login</button></a>
        </div>
        <div class="signup-section">
            <h2>Register</h2>
            <form action="{{ route('Register User') }}" method="POST">
                @csrf
                <input type="text" placeholder="Username" name="Username" class="input-field" value="{{ old('Username') }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
                <input type="text" placeholder="Email" name="Email" class="input-field" value="{{ old('Email') }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Password" name="Password" class="input-field">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
                @if (session()->has('registerFailed'))
                    <div>{{ session('registerFailed') }}</div>
                @endif
                <button type="submit" class="signup-button">Sign In</button>
            </form>
        </div>
    </div>
    @endsection

</body>

</html>
