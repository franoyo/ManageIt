<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agregar tarea</title>
    <link rel="stylesheet" href="{{ asset('css/styleAgregar.css') }}">
</head>
<body>
<div class="container-modal">
    <form action="" method="post" class="modal">
        <div class="container-title">
            <div class="sivs"></div>
            AGREGAR TAREA
            <div class="sivs"><input type="button" value="x" id="mamañema"></div>
        </div>
        <div class="container-inputs">
            <div class="div">
                <div class="yet">
                    <div class="subtitle">TAREA:</div>
                    <div class="put-input">
                        <textarea class="area" name="" id=""></textarea>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">LUGAR:</div>
                    <div class="put-input">
                        <input  class="inps" type="text">
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">NOTAS(OPCIONAL):</div>
                    <div class="put-input">
                        <textarea class="area" name="" id=""></textarea>
                    </div>
                </div>
            </div>
            <div class="div">
                <div class="yet">
                    <div class="subtitle">FECHA:</div>
                    <div class="put-input">
                        <input class="inps" type="date">
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">DESCRIPCION DE LA TAREA:</div>
                    <div class="put-input">
                        <textarea class="area" name=""></textarea>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">PORCENTAJE DE LA TAREA:</div>
                    <div class="put-input">
                        <input type="range" id="slider" name="slider" min="1" max="100" value="1" oninput="updateValue(this.value)" required>
                        <span id="sliderValue">0</span>%
                    </div>
                </div>
            </div>
        </div>
        <footer class="ponlo">
            <input class="submit" type="submit" value="AGREGAR">
        </footer>
    </form>
    
</div>    
<script>
    function updateValue(value) {
        document.getElementById('sliderValue').innerText = value;
    }
    document.getElementById("slider").addEventListener("input", function() {
  var value = (this.value - this.min) / (this.max - this.min) * 100;
  this.style.background = 'linear-gradient(to right, #4CAF50 ' + value + '%, #88aff8 ' + value + '%)';
});
    
</script>
</body>
</html>