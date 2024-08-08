<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/styleDashboard.css?v=0.35')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @include('agregarTarea')
    <button id="agregar" onclick="mostrarAlerta()">+</button>
    <header class="header-container">

        <div class="vizajoso" id="visaje">
            <img width="100%" height="100%" src="{{asset('img/soloLogo.png')}}" alt="">
            </div>
            <div class="content-vizajoso" id="content-vizajoso">
                {{session('success')}}
            </div>
        <div class="put-logo">
            <img class="log" id="log" src="{{ asset('img/logo_manageIt1-removebg-preview.png') }}" alt="">
        </div>
        @if(session('success'))

        <script>
var icono=document.getElementById("visaje")
var contenido=document.getElementById("content-vizajoso")
var logo=document.getElementById("log")

logo.classList.add("animation-log")
contenido.classList.add("animation-content-vizajoso")
icono.classList.add("animation-vizajoso")

        </script>
        @endif
<div class="put-title">AGENDA</div>
        <div class="put-logo">
            <form id="cloze" action="{{route('logout')}}" method="POST">
                @csrf
                <input id="btna" type="submit" value="CERRAR SESION">
            </form>
        </div>
    </header>
    <main class="tareas-container">
        <div class="linea"></div>
        <div class="container-cards">
            <nav class="bar-options">
                <div class="container-reportes">
                    <a class="reporte" href="">EXCEL</a>
                    <a class="reporte" href="">PDF</a>
                </div>
                <form class="container-search" action="">
                    <input id="buscador" placeholder="BUSCADOR:" type="search" name="" id="">
                </form>
            </nav>
            <div class="put-cards">
                @foreach ($tareas as $tarea)
                <div class="card">
<div class="tarea">
    {{$tarea->nombre_tarea}}
</div>
<div class="tarea2">
    <div class="mitad">
        <div class="title">Fecha:</div>
        <div class="info">
            {{$tarea->fecha_tarea}}
        </div>
    </div>
    <div class="mitad">
        <div class="title">Porcentaje:</div>
        <div class="info"> {{$tarea->porcentaje}}%</div>
    </div>
</div>
<div class="tarea3">
<div class="mid">
    LUGAR:
</div>
<div class="mid2">
    {{$tarea->lugar}}
</div>
</div>
<div class="tarea4">
    <div class="desc">
        Descripcion de la tarea
    </div>
    <div class="description">
        {{$tarea->descripcion_tarea}}
    </div>
</div>
<nav class="options">
    <a href=""><i class="bi bi-eye-fill"></i></a>
    <a href=""><i class="bi bi-pencil-square"></i></a>
    <a href=""><i class="bi bi-trash-fill"></i></a>
</nav>
<div class="barra-porcentaje">
    <div id="barra" style="width: {{$tarea->porcentaje}}%;"></div>
</div>
                </div>
                @endforeach
            </div>
            <nav class="container-movebuttons">
               <div class="poner-btn">
                <button class="btns"><i class="bi bi-caret-left-square-fill"></i></button>
                <button class="btns"><i class="bi bi-caret-right-square-fill"></i></button>
               </div>
            </nav>
        </div>
    </main>
    <script>
    var arm=document.getElementById("container-modal")
    function mostrarAlerta(){
            arm.classList.add("deploy")
}
function inha(){
    arm.classList.remove("deploy")

}
    </script>
</body>
</html>