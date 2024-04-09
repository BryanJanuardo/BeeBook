<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
    <link rel="stylesheet" href="{{asset("/CSS/formeditgenre.css")}}">
</head>
<body>

    @extends('Layout')

    @section('PopUpEvent')
        <div class="PopUpDeleteGenre" id="PopUpDelete">
            <div class="PopUpDeleteGenre-content">
                <div class="PopUpDeleteGenre-top">
                    <p style="margin-left:min(20px, 6vh);">WARNING!!!</p>
                    <img id="ExitPopUpButton" style="width: min(40px, 10vh); height: min(40px, 10vh)" src="{{asset('Asset/ExitIcon.png')}}" alt="">
                </div>
                <div class="PopUpDeleteBook-bottom">
                    <p>Are you sure you want to delete this genre?</p>
                    <p style="font-size: min(12px, 2vh)">(The Deleted Genre cannot be recovered!)</p>
                    <div class="PopUpDeleteBook-bottom-button">
                        <button id="CancelPopUpButton">Cancel</button>
                        <button id="ConfirmPopUpButton">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .PopUpDeleteGenre{
                display: none;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                z-index: 999;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
            }

            .PopUpDeleteGenre-top{
                width: 100%;
                height: min(40px, 8vh);
                background-color: #022B3A;
                display: flex;
                font-size: min(16px, 4vh);
                justify-content: space-between;
                color: white;
                align-items: center;
            }

            .PopUpDeleteGenre-bottom{
                display: flex;
                flex-direction: column;
                margin-top: min(60px, 10vh);
                align-items: center;
                width: 100%;
                height: 100%;
            }

            .PopUpDeleteGenre-bottom p{
                width: 80%;
                text-align: center;
                font-size: min(24px, 4vh);
                word-wrap: none;
            }

            .PopUpDeleteGenre-bottom-button{
                margin-top: min(30px, 6vh);
                display: flex;
                gap: 30px;
            }

            .PopUpDeleteGenre-bottom-button button{
                width: min(100px, 20vh);
                height: min(40px, 8vh);
                background-color: #022B3A;
                border: none;
                color: white;
                font-size: min(16px, 4vh);
            }

            .PopUpDeleteGenre-content{
                width: min(500px, 80vh);
                height: min(300px, 45vh);
                background-color: #E1E5F2;
            }
        </style>
    @endsection

    @section('PageContent')

    <div class="form-container">
        <h1>Edit / Delete Genre</h1>
        <form id="formGenre" action="#">
            <div class="input-box">
                <label for="genre">Current Genre: <span style="font-weight: bold;"> Comedy</span></label>
                <input placeholder="Genre" id="Genre" name="Genre" type="text"><br><br>
            </div>
            <div class="button-box">
                <button >Edit Genre</button>
                <button id="deleteButton">Delete Genre</button>
            </div>
            <br>
        </form>

        <a href=""><button id="back-button" class="button">Back</button></a>
    </div>
    @endsection
</body>

<script>

    document.getElementById('deleteButton').addEventListener('click', function() {
        document.getElementById("PopUpDelete").style.display = 'flex';
        var newAction = "/deleteGenre/" + id;
        document.getElementById('formGenre').setAttribute('action', newAction);
    });

    document.getElementById("ExitPopUpButton").addEventListener('click', function() {
        document.getElementById("book-form").setAttribute('action', "#");
        document.getElementById("PopUpDelete").style.display = 'none';
    });

    document.getElementById("CancelPopUpButton").addEventListener('click', function() {
        document.getElementById("book-form").setAttribute('action', "#");
        document.getElementById("PopUpDelete").style.display = 'none';
    });

    document.getElementById("ConfirmPopUpButton").addEventListener('click', function() {
        document.getElementById("book-form").submit();
    });

</script>


</html>
