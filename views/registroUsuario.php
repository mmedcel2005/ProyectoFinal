<!DOCTYPE html>
<html>

<head>
  <title>Document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="jquery/jquery-3.3.1.min.js"></script>

</head>

<body>

  <?php

  //Se define la web destino del formulario
  $url_destino = "../controller/registroUsuarioCntrl.php";


  ?>

  <form method="POST" id="registroUsuario" action="<?= $url_destino ?>">

    <div class="container">

      <div class="row">


        <div class="col-lg-9 col-sm-9">

          <!-- Margenes con mb mr ml mt -sm-distancia-->
          <!-- Misma linea -->
          <!-- enviar nombre -->
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="nombre" name="nombre" />
            </div>
          </div>

          <!-- eniviar email  -->
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="email" class="col-lg-3 col-form-label">Email:</label>
            <div class="col-lg-6">
              <input type="email" class="form-control" id="email" name="email" />
            </div>
          </div>

          <!-- Enviar fecha de nacimiento -->
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="fechaNacimiento" class="col-lg-3 col-form-label">Fecha nacimiento:</label>
            <div class="col-lg-6">
              <input type="date" id="fechaNacimiento" name="fechaNacimiento">
            </div>
          </div>

          <!-- Seleccionar sexo  -->
          <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select form-select-lg" name="sexo" id="sexo">
              <option value="H" selected>Hombre</option>
              <option value="M">Mujer</option>
            </select>
          </div>

          <!-- Introducir contraseña  -->
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>

          <!-- Confirmar contraseña -->
          <div class="form-group">
            <label for="confirmPassword">Confirmar Password</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmar Password">
          </div>


    </div>

    <br>
      <!-- boton para enviar los dato  -->
    <button type="submit" name="registro" value="true" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2">Registrar</button>

    </div>
    </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- Scripts para usar el plugin jsquery validation -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<!-- jQuery Validation Additional Methods -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

<!-- Enlazamos el js con los parametros de la validacio  -->
<script src="../validation/registroUsuarioValidation.js"></script>

</html>