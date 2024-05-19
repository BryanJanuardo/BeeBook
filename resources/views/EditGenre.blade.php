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
                <div class="PopUpDeleteGenre-bottom">
                    <p>Are you sure you want to delete this genre?</p>
                    <p style="font-size: min(12px, 2vh)">(The Deleted Genre cannot be recovered!)</p>
                    <div class="PopUpDeleteGenre-bottom-button">
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
        <form id="formGenre" action="#" method="POST">
            @csrf
            <div class="input-box">
                <label for="genre">Current Genre: <span style="font-weight: bold;"> {{$genre->GenreName}}</span></label>
                <input placeholder="Genre" id="Genre" name="GenreName" type="text"><br><br>
            </div>
            <div class="button-box">
                <button id="editButton">Edit Genre</button>
                <button id="deleteButton">Delete Genre</button>
            </div>
            <br>
        </form>
        <button onclick="window.history.back();" id="back-button" class="button">Back</button>
    </div>
    @endsection
</body>

<script>

    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById('deleteButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById("PopUpDelete").style.display = 'flex';
            var newAction = "{{ route('deleteGenre', ['id' => $genre->id]) }}";
            document.getElementById('formGenre').setAttribute('action', newAction);

            var methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'DELETE');
            document.getElementById('formGenre').appendChild(methodField);
        });

        document.getElementById('editButton').addEventListener('click', function(event) {
            event.preventDefault();
            var newAction = "{{ route('editGenre', ['id' => $genre->id]) }}";
            document.getElementById('formGenre').setAttribute('action', newAction);

            var methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'PATCH');
            document.getElementById('formGenre').appendChild(methodField);
            document.getElementById("formGenre").submit();
        });

        document.getElementById("ExitPopUpButton").addEventListener('click', function(event) {
            document.getElementById("formGenre").setAttribute('action', "#");
            document.getElementById("PopUpDelete").style.display = 'none';
        });

        document.getElementById("CancelPopUpButton").addEventListener('click', function(event) {
            document.getElementById("formGenre").setAttribute('action', "#");
            document.getElementById("PopUpDelete").style.display = 'none';
        });

        document.getElementById("ConfirmPopUpButton").addEventListener('click', function(event) {
            document.getElementById("formGenre").submit();
            window.history.back();
        });
    });

</script>


</html>
