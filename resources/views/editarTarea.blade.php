<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar tarea</title>
    <link rel="stylesheet" href="{{ asset('css/styleAgregar.css?v=1') }}">
</head>
<body>
<div class="container-modal" id="container-modal-editar">
    <form action="{{route('updateTarea')}}" method="post" class="modal">
        @csrf
        <input type="hidden" name="id" id="receptacion">
        <div class="container-title">
            <div class="sivs"></div>
            EDITAR TAREA
            <div class="sivs"><input type="button" value="x" class="burpi" onclick="display()" id="mamañema"></div>
        </div>
        <div class="container-inputs">
            <div class="div">
                <div class="yet">
                    <div class="subtitle">TAREA:</div>
                    <div class="put-input">
                        <textarea class="area" name="tarea" id="tareita" required></textarea>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">LUGAR:</div>
                    <div class="put-input">
                        <input  class="inps" id="lugar" type="text" name="lugar" required>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">NOTAS(OPCIONAL):</div>
                    <div class="put-input">
                        <textarea class="area" name="notas" id="notas"></textarea>
                    </div>
                </div>
            </div>
            <div class="div">
                <div class="yet">
                    <div class="subtitle">FECHA:</div>
                    <div class="put-input">
                        <input class="inps" type="date" name="fecha" id="fecha" required>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">DESCRIPCION DE LA TAREA:</div>
                    <div class="put-input">
                        <textarea class="area" name="descripcion" id="descripcion" required></textarea>
                    </div>
                </div>
                <div class="yet">
                    <div class="subtitle">PORCENTAJE DE LA TAREA:</div>
                    <div class="put-input">
                        <input type="range" id="slider2" name="slider" min="1" max="100" value="1" oninput="updateValueZ(this.value)" required>
                        <span id="sliderValueZ">1</span>%
                    </div>
                </div>
            </div>
        </div>
        <footer class="ponlo">
            <input id="files" type="file" style="display: none" multiple accept=".png, .jpg, .jpeg">
            <label for="files" class="label">aver</label>
            <input class="submit" type="submit" value="EDITAR">
            <div class="label"></div>
        </footer>
    </form>
    
</div>    
<script>
    function updateValueZ(value) {
        document.getElementById('sliderValueZ').innerText = value;
    }
    document.getElementById("slider2").addEventListener("input", function() {
  var value = (this.value - this.min) / (this.max - this.min) * 100;
  this.style.background = 'linear-gradient(to right, #4CAF50 ' + value + '%, #88aff8 ' + value + '%)';
});



    
</script>
</body>
</html>