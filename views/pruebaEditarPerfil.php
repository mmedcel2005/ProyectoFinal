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
      <div class="form-group">
        <label for="calle">Calle:</label>
        <input type="text" class="form-control" id="calle" name="calle">
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="codigo-postal">Código Postal:</label>
          <input type="text" class="form-control" id="codigo-postal" name="codigo-postal">
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
        <label for="pais">País:</label>
        <input type="text" class="form-control" id="pais" name="pais">
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="tarjeta" name="tarjeta">
          <label class="custom-control-label" for="tarjeta">Seleccionar tarjeta</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

  <div class="container mt-5">
    <h2>Tarjetas con imágenes</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
          <div class="card-body">
            <h5 class="card-title">Tarjeta 1</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
          <div class="card-body">
            <h5 class="card-title">Tarjeta 2</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="imagen3.jpg" class="card-img-top" alt="Imagen 3">
          <div class="card-body">
            <h5 class="card-title">Tarjeta 3</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
