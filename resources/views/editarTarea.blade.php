
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar tarea</title>
    <link rel="stylesheet" href="{{ asset('css/styleAgregar.css?v=1.24') }}">
</head>
<body>
<div class="container-modal" id="container-modal-editar">
    <div id="imagePreviewEdit">
    </div>
    <div id="title-edit">VER/ELIMINAR FOTOS</div>
    <div id="precaution">ELIMINAR FOTO?</div>

    <div id="imagePreviewEditVer">
        
    </div>
    <div id="title-editAdd">FOTOS PARA AGREGAR:</div>
    
    <form action="{{route('updateTarea')}}" enctype="multipart/form-data" method="post" class="modal">
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
            <input id="files2" type="file" style="display: none" name="images[]" accept="image/*" onchange="previewImagesEdit(event, '#imagePreviewEditVer')" multiple accept=".png, .jpg, .jpeg">

            <label for="files2" class="label" ><i class="bi bi-card-image"></i></label>
            <input class="submit" type="submit" value="EDITAR">

            <div class="label" style="opacity: 0"></div>
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

function previewImagesEdit(event, querySelector) {
    const input2 = event.target;
    const imgPreviewContainerVer = document.querySelector(querySelector);
    
    // Limpiamos cualquier contenido previo en el contenedor de previsualización
    imgPreviewContainerVer.innerHTML = '';

    // Verificamos si existen imágenes seleccionadas
    if (!input2.files.length) return;

    // Verificar si la cantidad de archivos seleccionados excede el máximo permitido
    const maxFiles2 = 15;
    if (input2.files.length > maxFiles2) {
        alert(`Puedes subir un máximo de ${maxFiles2} imágenes.`);
        // Limpiar la selección de archivos
        input2.value = '';
        return;
    }

    // Recorremos todos los archivos seleccionados
  
    Array.from(input2.files).forEach(file => {
        // Creamos una URL para cada archivo
 
        const objectURL2 = URL.createObjectURL(file);

        // Creamos un elemento de imagen
        const img2 = document.createElement('img');
        img2.src = objectURL2;
        img2.style.maxWidth = '40%';
        img2.style.maxHeight = '45%';
        img2.style.margin = '2%';

        // Añadimos la imagen al contenedor de previsualización
        imgPreviewContainerVer.appendChild(img2);
    });
}

    
</script>
</body>
</html>