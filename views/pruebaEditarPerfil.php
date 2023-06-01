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
          <input type="checkbox" class="custom-control-input" id="tarjeta1" name="tarjeta" onclick="uncheckOtherCheckboxes(this)">
          <label class="custom-control-label" for="tarjeta1">Tarjeta 1</label>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="tarjeta2" name="tarjeta" onclick="uncheckOtherCheckboxes(this)">
          <label class="custom-control-label" for="tarjeta2">Tarjeta 2</label>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="tarjeta3" name="tarjeta" onclick="uncheckOtherCheckboxes(this)">
          <label class="custom-control-label" for="tarjeta3">Tarjeta 3</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
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
