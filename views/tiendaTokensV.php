<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE | Inicio</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../style/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      background-color: #1c1c1c;
    }

    .bg-custom {
      background-color: #121212;
    }

    .bg-custom-sec {
      background-color: #2b2b2b;
    }

    .imagen-superpuesta {
      top: 0;
      right: 0;
      max-width: 100px;
      /* Ajusta el ancho máximo de la imagen superpuesta */
      width: 100%;
      /* Asegura que la imagen ocupe todo el ancho del contenedor */
      height: auto;
      /* Ajusta la altura automáticamente */
    }

    .text-token {
      color: #efb810;
      font-weight: bold;
    }

    .btn-amarillo {
      background-color: #efb810;
      font-weight: bold;
    }

    tr:last-child td {
  border-bottom: none;
}
.btn-amarillo:hover {
      background-color: #efb810;
      color: white;
    }
  </style>
</head>

<body>
  <header>
    <!--------------- NAV  --------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
      <div class="container-fluid">
        <a class="nav-link" href="../index.php">
          <img src="..\src\img\logoXL.png" alt="" style="height: 40px" />
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php"><b>Mistery Boxes</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b>Oro gratis</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controller/tiendaTokensC.php"><b>Tienda</b></a>
            </li>
            <li class="nav-item"></li>
          </ul>

          <?php
          print('<div class="d-flex mx-lg-5">');
          print('<a class="nav-link" href="../controller/usuarioC.php"><img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 50px;" />');
          print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span> <br /> <p class="text-token"> <b>' . $_SESSION['cantTokens'] . ' </b></p>');
          print("</a></div>");
          print("");

          ?>
          <div id="google_translate_element" class="google"></div>
        </div>
      </div>
    </nav>
  </header>


  <main>

    <article>
      <div class="container">
        <div class="row mt-3">

          <?php
          foreach ($packTokens as $tokens) {
            print('<div class="col-sm-4 mb-3">');
            print(' <div class="card position-relative text-center bg-custom-sec">');
            print('  <img src="' . $tokens["imagen"] . '" class="card-img-top" alt="Imagen de ' . $tokens["cantidadToken"] . ' tokens">');
            if ($caja["enOferta"] == "S") {
              print('<img src="../src/img/oferta.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
            }
            print('  <div class="card-body">');
            print('    <p class="card-text text-muted"><b>' . $tokens["precio"] . ' €</b></p>');
            print('    <h5 class="card-text text-token">' . $tokens["cantidadToken"] . '</h5>');
            print('     <input type="hidden" id="idPackToken" name="idPackToken" value="' . $tokens["idPackToken"] . '">');
            print('     <button type="submit" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-amarillo color-tokens col-sm-11">Comprar</button>');
            print('   </div>');
            print(' </div>');
            print('</div>');
          }
          ?>

        </div>
      </div>
    </article>

    <article>
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecciona método de pago:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Seleccionar</th>
                <th scope="col">Nombre de la tarjeta</th>
                <th scope="col">Números de la tarjeta</th>
                <th scope="col">Titular de la tarjeta</th>
                <th scope="col">Fecha de caducidad</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago1" onchange="handleCheckboxChange(1)"></td>
                <td>Tarjeta 1</td>
                <td>**** **** **** 1234</td>
                <td>John Doe</td>
                <td>05/25</td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago2" onchange="handleCheckboxChange(2)"></td>
                <td>Tarjeta 2</td>
                <td>**** **** **** 5678</td>
                <td>Jane Smith</td>
                <td>10/23</td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago3" onchange="handleCheckboxChange(3)"></td>
                <td>Tarjeta 3</td>
                <td>**** **** **** 9012</td>
                <td>Mark Johnson</td>
                <td>09/24</td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox" name="metodoPago" id="metodoPago4" onchange="handleCheckboxChange(4)"></td>
                <td>Tarjeta 4</td>
                <td>**** **** **** 3456</td>
                <td>Alice Johnson</td>
                <td>12/26</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input type="hidden" value="" id="idObjeto">
          <button type="button" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
</article>

<script>
  function handleCheckboxChange(checkboxNumber) {
    // Desmarcar todos los checkboxes excepto el seleccionado
    for (let i = 1; i <= 4; i++) {
      if (i !== checkboxNumber) {
        document.getElementById('metodoPago' + i).checked = false;
      }
    }
  }
</script>




  </main>
  <!--------------- FOOTER  --------------->

  <footer class="bg-custom text-center text-white" id="contact_footer">
    <br>
    <div class="d-flex justify-content-around">
      <div>
        <h3>Contacto</h3>
        <p>
          <i class="bi bi-facebook"></i> Facebok<br>
          <i class="bi bi-instagram"></i> Instagram<br>
          <i class="bi bi-twitter"></i> Twitter<br>
          <i class="bi bi-envelope"></i> support@ejemplo.com<br>
          <i class="bi bi-telephone-fill"></i> +34 45 67 23 45<br>
        </p>
      </div>
      <div>
        <h3>Información</h3>
        <p>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a><br>
          <a href=""> Politicas y preguntas</a>

        </p>
      </div>
      <div>
        <h3>Formas de pago</h3>
        <p>
          897 87 78 23<br>
          654 98 65 09<br>
          789 09 39 85
        </p>
      </div>
    </div>

    <div class="text-center p-3">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Manuel Medina</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  function handleCheckboxChange(checkboxNumber) {
    // Desmarcar todos los checkboxes excepto el seleccionado
    for (let i = 1; i <= 4; i++) {
      if (i !== checkboxNumber) {
        document.getElementById('metodoPago' + i).checked = false;
      }
    }
  }
</script>
</body>

</html>