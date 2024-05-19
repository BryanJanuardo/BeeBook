<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Book</title>

    <link rel="stylesheet" href="{{asset('CSS/detailbook.css')}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>

</head>

<body>
    @extends('Layout')

    @section('PageContent')
        <div class="detail-container">
            <div class="left">
                <img src="./storage/Book/BookPicture/{{ $book->BookPicture }}" class="book">
            </div>

            <div class="right">
                <h1 class="title">{{$book->BookTitle}}</h1>
                <p class="author"><strong>By </strong>{{$book->AuthorName}}</p>
                <h3 class="rating">4.5/10 <img style="width: 16px; height: 16px;" src="{{asset('Asset/Blackstar.png')}}" alt=""></h3>
                <p class="desc">Timeless lessons on wealth, greed, and happiness</p>
                <div style="display: flex; flex-direction: row; align-items: center; gap: 20px;">
                    <button class="read-now">Read Now!</button>
                    <a href=""><img draggable="false" style="width: 30px; height: 28px;" src="{{asset('Asset/Wishlist.png')}}" alt=""></a>
                    <a href="{{route('Edit Book', ['ISBN' => $book->ISBN])}}"><img draggable="false" style="width: 30px; height: 28px;" src="{{asset('Asset/Editpencil.svg')}}" alt=""></a>
                </div>
            </div>
        </div>

        <hr>

        <form action="">
            <div class="rating-container">
                <h2>Rating</h2>
                <div style="position: relative;" class="rating-send">
                    <div class="rating-star"><span style="padding-right: 5px;" class="rating-right">&nbsp; / &nbsp;10.0</span><img draggable="false" style="background-color: #022B3A; width: 16px; height: 16px;" src="{{asset('Asset/Whitestar.png')}}" alt=""></div>
                    <input id="Ratinginput" value="0.0" type="text" />
                    <div class="arrow-box">
                        <img draggable="false" id="Arrowup" src="{{asset('Asset/Arrowup.png')}}" alt="">
                        <img draggable="false" id="Arrowdown" src="{{asset('Asset/Arrowdown.png')}}" alt="">
                    </div>
                    <button>Send</button>
                </div>
            </div>
        </form>

        <form action="">
            <div class="comment-container">
                <h2>Comments</h2>
                <div class="comment-send">
                    <input type="text" placeholder="Put your comments here..." />
                    <button>Send</button>
                </div>
            </div>
        </form>

        <div class="cards">
            <div class= "card">
                <div style="display: flex; gap: 20px; align-items: center;">
                    <h3 style="padding: 0%; margin: 0;">Budi</h3>
                    <div style="width: 100px; display: flex; ">
                        <span>10.0</span>
                        <span style="display: flex; align-items: center; gap: 6px;">&nbsp;/ 10.0 <img draggable="false" style="width: 14px; height: 12px;" src="{{asset('Asset/Whitestar.png')}}" alt=""></span>
                    </div>
                </div>
                <p>Bukunya kerenn, udah pernah beli bukunya tapi yang versi bahasa jawa</p>
            </div>
        </div>

    <script>

function validationFormatInput(value) {
            if (value !== "") {
        // Parse the input value
        let parsedValue = parseFloat(value);

        // Check if the parsed value is exactly 0.0
        if (parsedValue === 0) {
            value = "0.0";
        } else if ((parsedValue * 10) % 10 == 0) {
            // If the value is a whole number, add ".0" to it
            value = value + ".0";
        }

        ratingInput.value = value;
    }
    return value;
}

    function validationValue(newValue) {
        if(typeof(newValue) !== 'number'){
            return "0";
        }else if (newValue < 0) {
            return "0";
        } else if (newValue > 10) {
            return "10";
        }
        return newValue.toString();
    }

    function resetInput(value, ratingInput) {
        value = validationFormatInput(value);
        ratingInput.value = value;
    }

    let value = "0";
    let ratingInput = document.getElementById("Ratinginput");
    resetInput(value, ratingInput);

    ratingInput.addEventListener("change", function() {
        value = validationValue(ratingInput.value);
        value = Math.round((parseFloat(value) * 10)) / 10;

        resetInput(value, ratingInput);
    });

    let arrowup = document.getElementById("Arrowup");
    arrowup.addEventListener("click", function() {
        newValue = Math.round(((parseFloat(value) + 0.1) * 10)) / 10;
        value = validationValue(newValue);
        resetInput(value, ratingInput);
    });

    let arrowdown = document.getElementById("Arrowdown");
    arrowdown.addEventListener("click", function() {
        newValue = Math.round(((parseFloat(value) - 0.1) * 10)) / 10;
        value = validationValue(newValue);
        resetInput(value, ratingInput);
    });

    </script>
@endsection

</body>


</html>
