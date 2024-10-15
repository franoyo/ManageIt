<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoja de vida equipos</title>
    <link rel="stylesheet" href="{{asset('css/styleForm.css?=1.0')}}">
    <meta name="title" content="Nombre del archivo PDF">

</head>
<body>
    <div class="main-container">
        <header class="cabecera-container">
            <div class="sub-text"></div>
            <div class="text">{{$hoja->titulo_hoja}}</div>
            <div id="tx" class="sub-text">
            <div class="div">FORMATO HOJA DE VIDA TECNOLOGIA</div>
            <div id="two" class="div">FECHA:{{$hoja->fecha_hoja}}</div>
            <div class="div">VERSION:1</div>
            </div>
        </header>
        <div class="info-container">
<div class="container-inf">
<div class="container-subtitles">
    <div class="mitad">SEDE:</div>
    <div class="mitad">UBICACION:</div>
</div>
<div class="container-inputs">
    <div class="mid">{{$hoja->sede}} </div>
    <div class="mid">{{$hoja->ubicacion}} </div>
</div>
<div class="container-subtitles">
    <div class="mitad">MARCA:</div>
    <div class="mitad">REFERENCIA:</div>
</div>
<div class="container-inputs">
    <div class="mid">{{$hoja->marca}} </div>
    <div class="mid">{{$hoja->referencia}} </div>
</div>
<div class="container-subtitle">
  NOTAS:
</div>
<div class="container-notas">
    {{$hoja->notas}}
</div>
</div>
<div class="correction-container">
<div class="titulos">
    <div class="mitad">PREVENTIVO</div>
    <div class="mitad">CORRECTIVO</div>
</div>
<div class="put-info-container">
    <div class="partelo">
        <div class="put-input">
            
         <span class="fecha">{{$hoja->preventivo_fecha1}}</span>
         <span class="desc">{{$hoja->preventivo1}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha2}}</span>
            <span class="desc">{{$hoja->preventivo2}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha3}}</span>
            <span class="desc">{{$hoja->preventivo3}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha4}}</span>
            <span class="desc">{{$hoja->preventivo4}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha5}}</span>
            <span class="desc">{{$hoja->preventivo5}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha6}}</span>
            <span class="desc">{{$hoja->preventivo6}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha7}}</span>
            <span class="desc">{{$hoja->preventivo7}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->preventivo_fecha8}}</span>
            <span class="desc">{{$hoja->preventivo8}}</span>
        </div>
    </div>
    <div class="partelo">
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha1}}</span>
            <span class="desc">{{$hoja->correctivo1}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha2}}</span>
            <span class="desc">{{$hoja->correctivo2}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha3}}</span>
            <span class="desc">{{$hoja->correctivo3}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha4}}</span>
            <span class="desc">{{$hoja->correctivo4}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha5}}</span>
            <span class="desc">{{$hoja->correctivo5}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha6}}</span>
            <span class="desc">{{$hoja->correctivo6}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha7}}</span>
            <span class="desc">{{$hoja->correctivo7}}</span>
        </div>
        <div class="put-input">
            <span class="fecha">{{$hoja->correctivo_fecha8}}</span>
            <span class="desc">{{$hoja->correctivo8}}</span>
        </div>
    </div>
</div>
</div>
        </div>
        </div>

    <script>

    </script>
</body>
</html>