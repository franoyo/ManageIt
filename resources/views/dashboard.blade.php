<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/styleDashboard.css?v=0.36')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @include('alertaEliminar')
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
            <div class="put-cards" id="deslizar">
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
    <a href class="ñema"><i class="bi bi-eye-fill"></i></a>
    <a class="ñema" href=""><i class="bi bi-pencil-square"></i></a>
    <a class="delete-button ñema" data-id="{{$tarea->id}}" data-tarea="{{$tarea->nombre_tarea}}"><i class="bi bi-trash-fill "></i></a>
</nav>
<div class="barra-porcentaje">
    <div id="barra" style="width: {{$tarea->porcentaje}}%;"></div>
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
    var arm=document.getElementById("container-modal")
    function mostrarAlerta(){
            arm.classList.add("deploy")
}
function inha(){
    arm.classList.remove("deploy")

}

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
    const porcentajeDesplazamiento = 99; // Porcentaje de desplazamiento deseado
    const desplazamiento = slider.offsetWidth * (porcentajeDesplazamiento / 100);
    slider.scrollLeft -= desplazamiento;
});

der.addEventListener('click', () => {
    const porcentajeDesplazamiento = 99; // Porcentaje de desplazamiento deseado
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

var deleteButtons = document.getElementsByClassName('delete-button');
            const launcAlert=document.getElementById("alertitaz");
            const closeButton=document.getElementById("close");
          
            for (var i = 0; i < deleteButtons.length; i++) {
              deleteButtons[i].addEventListener('click', function(e) {
                e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
                var id = this.getAttribute('data-id'); // Obtener la ID almacenada en data-id
                var tarea=this.getAttribute('data-tarea')
                // Mostrar una alerta con la ID correspondiente
                launcAlert.classList.add("launch")
                var lil=document.getElementById("inp");
                var inputTarea=document.getElementById("tarea")
                inputTarea.value=tarea;
                lil.value = id;
              });
            }
            closeButton.addEventListener('click', function(){
                launcAlert.classList.remove("launch");
            })
    </script>
</body>
</html>