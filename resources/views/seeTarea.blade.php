<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/styleSee.css')}}">
</head>
<body>
    <div class="main-container">
        <nav class="future-nav">
            <img class="logo" src="{{asset('img/soloLogo.png')}}" alt="">
        </nav>
        <div class="containerFlecha" onclick="redirigir()">
            <div class="arrow-back"></div>
            <a href="{{route('dashboard')}}" class="corpo">VOLVER</a>
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
                    @forelse ($tarea->photos as $photo)
                    <img src="{{ asset($photo->ruta) }}" class="image" alt="Foto de la tarea">
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
 
    </script>
</body>
</html>