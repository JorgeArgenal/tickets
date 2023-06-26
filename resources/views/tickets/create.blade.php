@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="idEquipo">Id del Equipo (opcional)</label>
            <input type="text" name="idEquipo" id="idEquipo" class="form-control"
                placeholder="Ingrese el numero de identificación del equipo si es posible">
        </div>
        <div class="form-group">
            <label for="TipoEquipo">Tipo de equipo</label>
            <input type="text" name="TipoEquipo" id="TipoEquipo" required class="form-control"
                placeholder="Ingrese qué tipo de equipo es">
        </div>
        <div class="form-group">
            <label for="Marca">Marca</label>
            <input type="text" name="Marca" id="Marca" required class="form-control"
                placeholder="Ingrese la marca del equipo ">
        </div>
        <div class="form-group">
            <label for="Modelo">Modelo</label>
            <input type="text" name="Modelo" id="Modelo" required class="form-control"
                placeholder="Ingrese el modelo del equipo ">
        </div>
        <div class="form-group">
            <label for="NoSerie">No. Serie</label>
            <input type="text" name="NoSerie" id="NoSerie" class="form-control"
                placeholder="Ingrese el numero de serie del equipo si es posible">
        </div>
        <div class="form-group">
            <label for="Color">Color</label>
            <input type="text" name="Color" id="Color" required class="form-control"
                placeholder="Ingrese el color del equipo ">
        </div>
        <div class="form-group">
            <label for="Caracteristicas">Caracteristicas</label>
            <input type="text" name="Caracteristicas" id="Caracteristicas" class="form-control"
                placeholder="Ingrese alguna caracteristica notable del equipo si es posible">
        </div>
        <div class="form-group">
            <label for="FechaEnvio">Fecha de envío</label>
            <input type="date" name="FechaEnvio" id="FechaEnvio" required class="form-control" placeholder="Ingrese el ">
        </div>

        <div class="form-group">
            <label for="Problema">Descripción del problema</label>
            <textarea name="Problema" id="Problema" cols="50" rows="3" class="form-control col-12"
                placeholder="Ingrese cuál es el problema que tiene el equipo" required></textarea>
        </div>

        <div class="mb-3">
            <label for="imagenes" class="form-label">Adjunte las imágenes del equipo (máximo 5)</label>
            <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple
                onChange="previsualizacion(event)" accept="image/png, image/gif, image/jpeg" required>
        </div>

        <div id="previsualizacion" class="row"></div>

        <button type="submit" class="btn btn-success">Crear ticket</button>
    </form>
@endsection

<script>
    function previsualizacion(event) {
        var previewContainer = document.getElementById('previsualizacion');
        previewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(event) {
                var imgElement = document.createElement('img');
                imgElement.className = 'thumbnail'; // Usar la clase "thumbnail" para las miniaturas
                imgElement.src = event.target.result;

                previewContainer.appendChild(imgElement);
            };
            console.log(files);
            reader.readAsDataURL(file);
        }
    }
</script>
