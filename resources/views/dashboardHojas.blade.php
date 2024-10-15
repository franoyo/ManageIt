<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/styleDashboard.css?v=1.25')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{asset('img/soloLogo.png')}}" />
 
</head>
<body>
    @include("modalForm")
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
<div class="put-title">HOJAS DE VIDA</div>
        <div class="put-logo">
            <form id="cloze" action="{{route('logout')}}" method="POST">
                @csrf
                <input id="btna" type="submit" value="CERRAR SESION">
            </form>
        </div>
    </header>
    <main class="tareas-container">
       
        <div class="linea"></div>
        <div id="menu">
            <div class="section">
                <img class="logs" src="{{ asset('img/logo_manageIt1-removebg-preview.png') }}" alt="">
            </div>
            <nav class="container-btns">
                <a class="nav" href="">Mis cronogramas</a>
                <a class="nav" href="{{route('dashboard')}}">Tareas</a>
                <a class="nav" href="">Historial de tareas</a>
            </nav>
            <div class="section"></div>
        </div>
        <div id="desplegar-menu" onclick="abrirMenu()"></div>
        <div class="container-cards">
            <nav class="bar-options">
                <div class="container-reportes">
                    <a class="reporte" href="{{route('tareasExcel')}}">EXCEL</a>
                    <a class="reporte" href="">PDF</a>
                </div>
                <form class="container-search" action="{{route('buscarTarea')}}" method="GET">
                    <input id="buscador" placeholder="BUSCADOR:" type="search" name="buscar" id="">
                </form>
            </nav>
            <div class="put-cards" id="deslizar">
                @foreach ($hojas as $hoja)
                <div class="card">
<div class="tarea">
    {{$hoja->titulo_hoja}}
</div>
<div class="tarea2">
    <div class="mitad">
        <div class="title">Fecha:</div>
        <div class="info">
            {{$hoja->fecha_hoja}}
        </div>
    </div>
    <div class="mitad">
        <div class="title">Sede:</div>
        <div class="info"> {{$hoja->sede}}</div>
    </div>
</div>
<div class="tarea3">
<div class="mid">
    UBICACION:
</div>
<div class="mid2">
    {{$hoja->ubicacion}}
</div>
</div>
<div class="tarea4">
    <div class="desc">
       MARCA Y REFERENCIA:
    </div>
    <div class="description">
        {{$hoja->marca}} {{$hoja->referencia}}
    </div>
</div>
<nav class="options">
    <a class="ñema" href="{{route('verHoja', ['id' => $hoja->id])}}"><i class="bi bi-eye-fill"></i></a>
    <a class="ñema edit-button" data-id="{{$hoja->id}}" href=""><i class="bi bi-pencil-square"></i></a>
    <a class="delete-button ñema" data-id="{{$hoja->id}}"><i class="bi bi-trash-fill "></i></a>
</nav>
<div class="barra-porcentaje">
    <div id="barra" style="width:100%;"></div>
</div>
                </div>
                @endforeach
            </div>
            <nav class="container-movebuttons">
               <div class="poner-btn">
                <button class="btns" id="izq"><i class="bi bi-caret-left-square-fill"></i></button>
                <button class="btns" id="der"><i class="bi bi-caret-right-square-fill"></i></button>
               </div>
            </nav>
        </div>
    </main>
    <script>

const izq = document.getElementById("izq")
const der = document.getElementById("der")
const slider = document.getElementById("deslizar")
function guardarPosicionSlider() {
    const posicionActual = slider.scrollLeft;
    localStorage.setItem('posicionSlider', posicionActual);
}

// Función para restaurar la posición del slider desde el almacenamiento local
function restaurarPosicionSlider() {
    const posicionGuardada = localStorage.getItem('posicionSlider');
    if (posicionGuardada !== null) {
        slider.scrollLeft = parseInt(posicionGuardada);
    }
}

// Evento que se dispara cuando se hace clic en los botones de desplazamiento
izq.addEventListener('click', () => {
    const porcentajeDesplazamiento =99.9; // Porcentaje de desplazamiento deseado
    const desplazamiento = slider.offsetWidth * (porcentajeDesplazamiento / 100);
    slider.scrollLeft -= desplazamiento;
});

der.addEventListener('click', () => {
    const porcentajeDesplazamiento = 99.9; // Porcentaje de desplazamiento deseado
    const desplazamiento = slider.offsetWidth * (porcentajeDesplazamiento / 100);
    slider.scrollLeft += desplazamiento;
});

// Evento que se dispara cuando se ha completado el desplazamiento del slider
slider.addEventListener('scroll', () => {
    // Espera un breve momento para asegurarse de que el desplazamiento se ha completado completamente
    setTimeout(() => {
        guardarPosicionSlider(); // Guarda la nueva posición del slider
    }, 100); // Ajusta el tiempo según sea necesario
});

// Llama a la función para restaurar la posición del slider cuando la página se carga
window.addEventListener('load', () => {
    restaurarPosicionSlider();
});

var acumulador=0
function abrirMenu(){
const menu=document.getElementById("menu")
const boton=document.getElementById("desplegar-menu")
acumulador=acumulador+1;
if (acumulador%2==1) {
    menu.classList.add("deslumbro")
    boton.classList.add("mover")
    }else{
        menu.classList.remove("deslumbro")
        boton.classList.remove("mover")
    }  


}
    </script>
</body>
</html>