<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>

    <link rel="stylesheet" href={{ asset('CSS/aboutus.css') }}>

</head>
<body>
    @extends('Layout')

    @section('PageContent')
    <div class="page-content">
        <div class="heading">
            <h1>About Us</h1>
            <br>
        </div>
        <div class="paragraph">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac tellus magna. Maecenas fermentum lorem leo, ut accumsan erat blandit in. Praesent finibus varius finibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse scelerisque ornare justo sit amet molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <br>
            <p>Integer eleifend eget est tempus efficitur. Praesent molestie auctor vehicula. Sed consectetur, urna quis lacinia porttitor, mi tellus  finibus mauris, in volutpat turpis quam eu magna. Nullam commodo orci  tortor, rutrum volutpat ipsum venenatis in. Vestibulum vitae lectus eget  nunc pellentesque rhoncus. Donec vel vestibulum urna, ac viverra metus.  In quis laoreet mauris. Duis vulputate pharetra vulputate. Cras lorem  purus, consectetur eu sem sagittis, pretium dignissim sapien. Donec  commodo id elit at dictum.</p>
        </div>
    </div>
    @endsection

</body>
</html>
