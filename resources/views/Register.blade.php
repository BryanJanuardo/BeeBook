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

    <div class="container">
        <div class="login-section">
            <h2>Joined?</h2>
            <p>Read is my middle name!</p>
            <button class="login-button">Login</button>
        </div>
        <div class="signin-section">
            <h2>Register</h2>
            <form action="{{ route('Register User') }}" method="POST">
                @csrf
                <input type="text" placeholder="Username" name="Username" class="input-field" value="{{ old('Username') }}">
                @error('Username')
                    <div>{{ $message }}</div>
                @enderror
                <input type="text" placeholder="Email" name="Email" class="input-field" value="{{ old('Email') }}">
                @error('Email')
                    <div>{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Password" name="Password" class="input-field">
                @error('Password')
                    <div>{{ $message }}</div>
                @enderror
                <button type="submit" class="signin-button">Sign In</button>
            </form>
        </div>
    </div>


</body>

</html>
