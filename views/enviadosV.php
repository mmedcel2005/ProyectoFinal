<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE | Inicio</title>
  <link rel="icon" href="../src/img/logo-Mini.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
      h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: 'Bebas Neue', sans-serif;
    }
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
      max-width: 50px;
      /* Ajusta el ancho máximo de la imagen superpuesta */
      width: 100%;
      /* Asegura que la imagen ocupe todo el ancho del contenedor */
      height: auto;
      /* Ajusta la altura automáticamente */
    }

    .text-token {
      color: #efb810;
    }

    .btn-amarillo {
      background-color: #efb810;
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
              <a class="nav-link" href="../controller/tiendaTokensC.php"><b>Tienda</b></a>
            </li>
            <li class="nav-item"></li>
          </ul>

          <?php
          print('<div class="d-flex flex-column mx-lg-5">');
          print('<a class="nav-link" href="../controller/usuarioC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span>');
          print('</div>');
          print('</a>');

          print('<a class="nav-link mt-2" href="../controller/tiendaTokensC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="../src/img/token.png" alt="Imagen de token" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<p class="text-token"><b>' . $_SESSION['cantTokens'] . '</b></p>');
          print('</div>');
          print('</a>');

          print('</div>');


          ?>
          <div id="google_translate_element" class="google"></div>
        </div>
      </div>
    </nav>
  </header>


  <main>
    <section>
      <div class="container py-5 ">

        <!-- Carrito -->

        <h1 class="text-white">Mis pedidos</h1>
        <!-- Tarjeta pedido -->
        <div class="card bg-custom-sec text-white">
          <div class="card-header py-3 ">
            <div class="row ">
              <div class="col">
                <h5 class="mb-0">Estado</h5>
              </div>
              <div class="col-md-auto">
                Pedido efectuado el: 8 jan, 2023
                <br>
                Nº de pedido: 2343933400076235
              </div>

            </div>
          </div>

          <div class="card-body">
            <!-- Single item -->
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="" class="w-100" alt="imagen" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>Item
                  </strong></p>
                <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                  <i class="bi bi-trash-fill"></i>
                </button>

                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                <!-- Price -->
                <h2 class="text-start text-md-center">
                  <strong class="featured_prize">8888€</strong>
                </h2>
                <!-- Price -->
              </div>
            </div>
          </div>
        </div>





        <br>

      </div>
      </div>






      </div>
      </div>
    </section>
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