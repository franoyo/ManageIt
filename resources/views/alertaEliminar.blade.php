<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/styleEliminar.css?v=0.2')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <main class="principal-container" id="alertitaz">
        <form class="alerta-container" action="inhabilitar" method="post">
            @csrf
            <div class="put-img-text">
                <i id="icon" class="bi bi-x-diamond-fill"></i>
                
                Esta seguro de eliminar la tarea:
                <input id="inp" name="id" type="text" readonly>
                <input id="tarea" type="text" readonly>
                
            </div>
            <nav class="put-button">
                
               
                <div class="x" id="close"><i class="bi bi-x-circle"></i></div>
                <button class="btn"><i class="bi bi-check-circle"></i></button>
            </nav>
        </form>
    </main>
    <script>
        
    </script>
</body>
</html>