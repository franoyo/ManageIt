<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageIt</title>
    <link rel="stylesheet" href="{{ asset('css/style.css?v=1.2') }}">
</head>

<body>
@include("login")
@if(session('success'))
@include('alertaSuccess')
<script>
const desplieguez=document.getElementById("main-container8");
    setTimeout(() => {
        desplieguez.classList.add("watch")
    }, 500);
</script>
@endif
@unless($errors->isEmpty())
@include("alerta")
<script>
    const desplieguez=document.getElementById("main-container8");
    setTimeout(() => {
        desplieguez.classList.add("watch")
    }, 500);
    </script>
@endunless
    <button id="btn" onclick=aparecerModal() >INICIAR SESION</button>
    <header class="cabecera-container">
        <div class="put-logo">
            <img width="100%" height="100%" src="{{asset('img/logo_manageIt1-removebg-preview.png')}}" alt="logo">

        </div>
    </header>
    <main class="main-container">
        <div class="vivi">
            <h2>BIENVENIDO A MANAGEIT</h2>
           La mejor aplicacion para la gestion de tus tareas, puedes gestionar desde el porcentaje en el que va tu tarea, asi como notas rapidas sobre esta, agregar areas especificas de donde es la actividad y mucho mas, Tambien si lo necesitas puedes crear reportes!
        </div>
        <div class="division"></div>
        <div class="vivi2">
            <img class="slide" width="100%" height="100%" src="" alt="auto">
            <img class="slide" width="100%" height="100%"  src="" alt="auto">
            <img class="slide" width="100%" height="100%" src="" alt="auto">
        </div>
    </main>
    <footer class="footer-container">
        @Todos los derechos reservados, Hecho por Francisco Oyola.
    </footer>
    
    <script> 
const slider = document.querySelector('.vivi2');

function nextSlide() {
  slider.scrollLeft += slider.offsetWidth;
  if (slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth) {
    slider.scrollTo({ left: 0, behavior: 'smooth' });
  }
}

setInterval(nextSlide, 4000);
    </script>
</body>
</html>