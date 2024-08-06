<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/styleDashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header class="header-container">
        <div class="put-logo">
            <img width="85%" height="62.5%" src="{{ asset('img/logo_manageIt1-removebg-preview.png') }}" alt="">
        </div>
<div class="put-title">AGENDA</div>
        <div class="put-logo">
            <form id="cloze" action="">
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
                <div class="card">
<div class="tarea">
    falla area de mantenimiento
</div>
<div class="tarea2">
    <div class="mitad">
        <div class="title">Fecha:</div>
        <div class="info">
            17/02/2024
        </div>
    </div>
    <div class="mitad">
        <div class="title">Porcentaje:</div>
        <div class="info">90%</div>
    </div>
</div>
<div class="tarea3">
<div class="mid">
    LUGAR:
</div>
<div class="mid2">
    SUBA
</div>
</div>
<div class="tarea4">
    <div class="desc">
        Descripcion de la tarea
    </div>
    <div class="description">
se tiene que ir y arreglarlo lo mas rapidamente
    </div>
</div>
<nav class="options">
    <a href=""><i class="bi bi-eye-fill"></i></a>
    <a href=""><i class="bi bi-pencil-square"></i></a>
    <a href=""><i class="bi bi-trash-fill"></i></a>
</nav>
<div class="barra-porcentaje">
    <div id="barra" style="width: 95%;"></div>
</div>
                </div>
            </div>
            <nav class="container-movebuttons">
               
            </nav>
        </div>
    </main>
</body>
</html>