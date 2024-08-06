<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alertaInfo</title>
    <link rel="stylesheet" href="{{asset('css/styleAlerta.css?v=1.2')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="main-container8" id="main-container8">
    <div class="alerta">
        <div class="put-img">
            <img class="image" src="{{asset('img/signo-de-exclamacion.png')}}" alt="">
        </div>
        <div class="put-text">@foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
        @endforeach</div>
        <div class="put-button">
            <button id="ñe" onclick="ocultar()"><i class="bi bi-check2-circle"></i></button>
        </div>
    </div>
</div>
    <script>
        var tiña=document.getElementById("main-container8");

        function ocultar() {
        tiña.classList.remove("watch")    
            
        }
    </script>
</body>
</html>