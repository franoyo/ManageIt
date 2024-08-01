<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/styleLogin.css') }}">
</head>

<body>

    <div class="main-container-2" id="main-container-2" >
        <div class="truqitos" onclick=borrar()></div>
        <div class="truqitos1" onclick=borrar()></div>
        <div class="truqitos2" onclick=borrar()></div>
        <div class="truqitos3" onclick=borrar()></div>
        <div class="recordatorio" id="recordatorio">
            Recuerda, que tambien puedes compartir tu usuario por si quieres que alguien mas de tu confianza pueda agregar mas tareas o modificarlas!
        </div>
        <form class="container-login-new" action="" id="container-registro" method="post">
            <div class="put-logo">
                <a href=""><img class="img" src="{{asset('img/logo_manageIt1-removebg-preview.png') }}" alt=""></a>
            </div>
            <div class="put-title">
                POR FAVOR REGISTRESE
            </div>
            <div class="put-input">
                <input class="inp" type="email" name="name" placeholder="NOMBRE DE USUARIO:">
            </div>
            <div class="put-input">
                <input class="inp" type="password" name="email" placeholder="EMAIL:">
            </div>
            <div class="put-input">
                <input class="inp" type="password" name="password" placeholder="CONTRASEÑA:">
            </div>
            <div class="put-input">
                <input class="inp" type="password" name="password" placeholder="REPETIR CONTRASEÑA:">
            </div>

            <div class="final">
                <input class="btn" id="maik" type="submit" value="REGISTRARSE">
                <input class="btn" type="button" value="Volver" id="volver">
            </div>
            <div class="final">
                @2024
            </div>


        </form>

        <form class="container-login" id="container-login" action="" method="post">
            <div class="put-logo">
                <a href=""><img class="img" src="{{asset('img/logo_manageIt1-removebg-preview.png') }}" alt=""></a>
            </div>
            <div class="put-title">
                POR FAVOR LOGUEATE!
            </div>
            <div class="put-input">
                <input class="inp" name="correo" type="email" placeholder="CORREO:">
            </div>
            <div class="put-input">
                <input class="inp" name="contraseña" type="password" placeholder="CONTRASEÑA:">
            </div>
            <div class="final">
                <input class="btn" type="submit" value="INICIAR SESION">
            </div>
            <div class="final">
                <input class="btn" type="button" value="Olvido su contraseña? Haga Click aqui!">
            </div>
            <div class="final">
                @2024
                <input class="btn" id="button" type="button" value="No tiene Cuenta Registrese Aqui!">
            </div>


        </form>

    </div>
    <script src="{{asset('js/script.js')}}"></script>
<script>
    var alerta=document.getElementById("recordatorio");
    var modal=document.getElementById("main-container-2");
    function aparecerModal() {
        modal.classList.add("seerar")     
        setTimeout(() => {
        alerta.classList.add("revoke")
    }, 9000);
    }
    function borrar() {
        modal.classList.remove("seerar")
    }
</script>
</body>

</html>