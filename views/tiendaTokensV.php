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
  </style>
</head>

<body>
  <header>
    <!--------------- NAV  --------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
      <div class="container-fluid">
        <a class="nav-link" href="./index.html">
          <img src="" alt="" style="height: 40px" />
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#"><b>Mistery Boxes</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b>Oro gratis</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b>Tienda</b></a>
            </li>
            <li class="nav-item"></li>
          </ul>
          <div class="d-flex mx-lg-5">
            <a class="nav-link" href="#">
              <img
                src="usuario.jpg"
                alt="Imagen de usuario"
                class="rounded-circle usuario-imagen"
              />
              <span class="usuario-nombre">Nombre de Usuario</span> <br />
              <span class="usuario-monedas">100 Monedas</span>
            </a>
          </div>
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
    foreach($packTokens as $tokens){
      print('<div class="col-sm-4 mb-3">');
      print(' <div class="card position-relative text-center bg-custom-sec">');
      print('  <img src="' . $tokens["imagen"] . '" class="card-img-top" alt="Imagen de ' . $tokens["cantidadToken"] . ' tokens">');
      if ($caja["estado"] == "N") {
        print('<img src="../src/img/new.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
      } elseif ($caja["estado"] == "O") {
        print('<img src="../src/img/oferta.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
      }
      print('  <div class="card-body">');
      print('    <p class="card-text text-muted"><b>' . $tokens["precio"] . '</b></p>');
      print('    <h5 class="card-text text-token">' . $tokens["cantidadToken"] . '</h5>');
      print('    <form method="GET" action="../controller/abrirCajaC.php">');
      print('     <input type="hidden" id="idPackToken" name="idPackToken" value="' . $tokens["idPackToken"] . '">');
      print( '     <button type="submit" class="btn btn-amarillo color-tokens col-sm-11">Abrir</button>');
      print('   </form>');
      print('   </div>');
      print(' </div>');
      print('</div>');
    }
    ?>

    </div>
  </div>
</article>
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
</body>

</html>