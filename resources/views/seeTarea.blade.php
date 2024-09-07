<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/styleSee.css')}}">
</head>
<body>
    @include("galeria")
    <div class="main-container">
        <nav class="future-nav">
            <img class="logo" src="{{asset('img/soloLogo.png')}}" alt="">
        </nav>
        <div class="containerFlecha" onclick="redirigir()">
            <div class="arrow-back"></div>
            <a href="{{route('back')}}" class="corpo">VOLVER</a>
        </div>

        <main  class="carta">
            <div class="put-title">{{$tarea->nombre_tarea}}</div>
            <div class="put-title">
                <div class="mitad">
                <div class="submitad">Fecha:</div>
                <div class="put-info">{{$tarea->fecha_tarea}}</div>
                </div>
                <div class="mitad">
                    <div class="submitad">Porcentaje:</div>
                    <div class="put-info">
                        <div class="barra">
                            <div style="width:{{$tarea->porcentaje}}%" id="content"></div>
                        </div>
                        <p>{{$tarea->porcentaje}}%</p>
                    </div>
                </div>
            </div>
            <div class="subtitle">
                LUGAR:
            </div>
            <div class="subtitle">
                {{$tarea->lugar}}
            </div>
            <div class="subtitle">
                DESCRIPCION DE LA TAREA:
                  </div>
                  <div class="description">
                    {{$tarea->descripcion_tarea}}
                  </div>
                  <div class="container-images">
                    @php
             $count = 0; // Inicializa el contador
                    @endphp
                    @forelse ($tarea->photos as $photo)
                    @php
                    $count++; // Incrementa el contador en cada iteración
                @endphp
                    <img src="{{ asset($photo->ruta) }}" data-id="{{$count}}" class="image" alt="Foto de la tarea">

                @empty
                    NO HAY IMAGENES PARA MOSTRAR
                @endforelse
                
                 
                  
               

                  </div>
                  <div class="barra2">
                    <div id="lely" style="width:{{$tarea->porcentaje}}%"></div>
                  </div>
        </main>
       

    </div>
    <script>
        function redirigir(){
            let url = "{{ route('dashboard') }}";
            window.location.href = url;

        }
    

// Selecciona todas las imágenes con la clase 'clickable-image'
const images = document.querySelectorAll('.image');
const tarjetImage=document.getElementById('liza');
const galeria=document.getElementById('galeria');

// Agrega un evento de clic a cada imagen
images.forEach((image) => {
image.addEventListener('click', () => {
// Recupera el atributo 'src' de la imagen clickeada
const src = image.getAttribute('src');
const dataId=parseInt(image.getAttribute('data-id'))
galeria.classList.add("velo")
tarjetImage.setAttribute('src', src);
tarjetImage.setAttribute('data-id', dataId);

});
});
function cerrar(){ 

galeria.classList.remove("velo")

        
}
    </script>
</body>
</html>