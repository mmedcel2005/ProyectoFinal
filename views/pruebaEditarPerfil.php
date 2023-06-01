<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Formulario de Datos</h1>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="calle">Calle:</label>
                    <input type="text" class="form-control" id="calle" name="calle">
                </div>
                <div class="form-group col-md-4">
                    <label for="codigo-postal">Código Postal:</label>
                    <input type="text" class="form-control" id="codigo-postal" name="codigo-postal">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pais">País:</label>
                    <input type="text" class="form-control" id="pais" name="pais">
                </div>
                <div class="form-group col-md-4">
                    <label for="provincia">Provincia:</label>
                    <input type="text" class="form-control" id="provincia" name="provincia">
                </div>
                <div class="form-group col-md-4">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                </div>
            </div>
            <div class="form-group">
                <label for="tarjeta">Seleccionar Tarjeta:</label>
                <div class="card-deck">
                    <div class="card">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta1" value="1">
                                <label class="form-check-label" for="tarjeta1">
                                    Tarjeta 1
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta2" value="2">
                                <label class="form-check-label" for="tarjeta2">
                                    Tarjeta 2
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img src="imagen3.jpg" class="card-img-top" alt="Imagen 3">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta3" value="3">
                                <label class="form-check-label" for="tarjeta3">
                                    Tarjeta 3
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function uncheckOtherCheckboxes(checkbox) {
            const checkboxes = document.getElementsByName("tarjeta");
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== checkbox) {
                    checkboxes[i].checked = false;
                }
            }
        }
    </script>
</body>

</html>