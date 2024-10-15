<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoja de vida equipos</title>
    <link rel="stylesheet" href="{{asset('css/styleModalForm.css')}}">
</head>
<body>
    <div class="modal-container" id="main-modal">
    <form class="main-container" method="POST" action="{{route('storeHoja')}}">
        @csrf
        <header class="cabecera-container">
            <div class="sub-text"></div>
            <div class="text"><input id="inp" type="text" name="tituloHoja" placeholder="DIGITE EL TITULO DEL FORMATO" required></div>
            <div id="tx" class="sub-text">
            <div class="div">FORMATO HOJA DE VIDA TECNOLOGIA</div>
            <div id="two" class="div">FECHA:<input id="date" name="fecha" type="date"></div>
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
    <div class="mid"><input type="text" class="inps" name="sede"  required> </div>
    <div class="mid"><input type="text" class="inps" name="ubicacion"  required> </div>
</div>
<div class="container-subtitles">
    <div class="mitad">MARCA:</div>
    <div class="mitad">REFERENCIA:</div>
</div>
<div class="container-inputs">
    <div class="mid"><input type="text" class="inps" name="marca"  required> </div>
    <div class="mid"><input type="text" class="inps" name="referencia" required> </div>
</div>
<div class="container-subtitle">
  NOTAS:
</div>
<div class="container-notas">
<textarea name="notas" id="notas"></textarea>
</div>
<div class="container-interaction">
    <input class="bs" type="button" onclick="done()" value="Cerrar">
    <input class="bs" type="submit" value="Ingresar">
    
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
            <input type="date" name="fecha1" class="idp hidden">
            <input type="text" name="info1" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha2" class="idp hidden">
            <input type="text" name="info2" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha3" class="idp hidden">
            <input type="text" name="info3" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha4" class="idp hidden">
            <input type="text" name="info4" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha5" class="idp hidden">
            <input type="text" name="info5" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha6" class="idp hidden">
            <input type="text" name="info6" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha7" class="idp hidden">
            <input type="text" name="info7" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha8" class="idp hidden">
            <input type="text" name="info8" class="inf hidden">
            <button class="button">+</button>
        </div>
    </div>
    <div class="partelo">
        <div class="put-input">
            <input type="date" name="fecha9" class="idp hidden">
            <input type="text" name="info9" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha10" class="idp hidden">
            <input type="text" name="info10" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha11" class="idp hidden">
            <input type="text" name="info11" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha12" class="idp hidden">
            <input type="text" name="info12" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha13" class="idp hidden">
            <input type="text" name="info13" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha14" class="idp hidden">
            <input type="text" name="info14" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha15" class="idp hidden">
            <input type="text" name="info15" class="inf hidden">
            <button class="button">+</button>
        </div>
        <div class="put-input">
            <input type="date" name="fecha16" class="idp hidden">
            <input type="text" name="info16" class="inf hidden">
            <button class="button">+</button>
        </div>
    </div>
</div>
</div>
        </div>
    </form>
    </div>
    <script>
    var arm=document.getElementById("main-modal")
    function mostrarAlerta(){
            arm.classList.add("visible")
}
function done(){
            arm.classList.remove("visible")
}
        document.querySelectorAll('.button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        
        // Encuentra el contenedor padre (.put-input)
        const parentDiv = this.closest('.put-input');
        
        // Encuentra los inputs dentro del mismo contenedor
        const inputs = parentDiv.querySelectorAll('input');
        
        // Cambia la clase de los inputs para hacerlos visibles
        inputs.forEach(input => {
            input.classList.remove('hidden');
            input.classList.add('visible');
        });

        // Desactiva el botón + si ya se hizo clic
        this.disabled = true; // Desactiva el botón
        this.style.opacity = '0'; // También lo oculta si quieres que desaparezca visualmente
        this.style.pointerEvents = 'none';
    });
});

    </script>
</body>
</html>