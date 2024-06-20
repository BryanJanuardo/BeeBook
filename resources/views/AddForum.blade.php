<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
    <link rel="stylesheet" href="{{asset('CSS/formaddforum.css')}}">
</head>


<body>

    @extends('Layout')
    @section('PageContent')

    <div class="form-container">
        <h1>Create Forum</h1>
        <form method="POST" action="{{route('Create Forum')}}">
            @csrf
            <label for="topic">Topic</label>
            <input type="text" id="topic" name="topic" required>

            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" rows="5" required></textarea>

            <button type="submit">Submit</button>
        </form>
        <a href="{{route('Dashboard')}}"><button id="back-button" class="button">Back</button></a>
    </div>

    @endsection
</body>
</html>
