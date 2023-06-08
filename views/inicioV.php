<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../src/img/logo-Mini.png" type="image/x-icon">
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

    .btn-bg-custom {
      background-color: #121212;
    }

    .btn-bg-custom:hover {
      background-color: #121212;

    }

    .btn-amarillo:hover {
      background-color: #efb810;
      color: white;
    }

    .notification {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: green;
      color: white;
      padding: 10px;
      border-radius: 5px;
      display: none;
    }

    .notification.show {
      display: block;
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
    <!--------------- NAV BOXES  --------------->
    <article id="nav-boxes">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-16 ">
            <div class="card mb-4 bg-custom-sec">
              <div class="card-body text-center bg-custom-sec ">
                <div class="d-flex justify-content-between ">
                  <form action="../index.php" method="post">
                    <button class="btn  flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == null) {
                                                                                                      print('active');
                                                                                                    } ?>">POPULAR</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "T") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="T">TECNOLOGÍA</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn  flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "R") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="R">ROPA</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn  flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "F") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="F">FIGURAS</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn  flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "A") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="A">ACCESORIOS</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn  flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "N") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="N">NUEVO</button>
                  </form>
                  <form action="../index.php" method="post">
                    <button class="btn flex-fill mx-2 pt-2 pb-2 text-muted rounded-1 btn-bg-custom <?php if ($_POST["categoria"] == "O") {
                                                                                                      print('active');
                                                                                                    } ?>" name="categoria" id="categoria" value="O">OFERTAS</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>


    <article>
      <div class="container">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div class="row d-none" id="cajas">


          <?php
          foreach ($datosCajas as $caja) {

            print('<div class="col-sm-4 mb-3">');
            print(' <div class="card position-relative text-center bg-custom-sec">');
            print('  <img src="' . $caja["imagen"] . '" class="card-img-top" alt="Imagen ' . $caja["nombre"] . '">');
            if ($caja["estado"] == "O") {
              print('<img src="../src/img/oferta.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
            } elseif ($caja["estado"] == "N") {
              print('<img src="../src/img/new.png" class="position-absolute imagen-superpuesta" alt="Caja Nueva">');
            }
            print('  <div class="card-body">');
            print('    <p class="card-text text-muted"><b>' . $caja["nombre"] . '</b></p>');
            print('    <h5 class="card-text text-token">' . $caja["precio"] . '</h5>');
            if ($_SESSION["is_admin"] == true) {
              print('<form action="../controller/editarCajaC.php" method="post">');
              print('     <input type="hidden" id="editarCajaID" name="editarCajaID" value="' . $caja["idCaja"] . '">');
              print('     <button type="submit" class="btn btn-secondary color-tokens col-sm-11">Editar</button>');
              print('   </form>');
            }
            print('<form action="../controller/abrirCajaC.php" method="post">');
            print('     <input type="hidden" name="idCaja" value="' . $caja["idCaja"] . '">');
            print('     <button type="submit" class="btn btn-amarillo color-tokens col-sm-11">Abrir</button>');
            print('   </form>');
            print('   </div>');
            print(' </div>');
            print('</div>');
          }
          ?>

        </div>
      </div>
    </article>

    <?php
    if ($mensaje != null) {
      print('<div id="notification" class="notification">');
      print('<span id="notification-message" class="notification-message">' . $mensaje . '</span>');
      print('</div>');
    }
    ?>


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
    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notification-message');

    // Función para mostrar la ventana emergente con un mensaje específico
    function showNotification() {
      notification.classList.add('show');

      // Ocultar la ventana emergente después de 5 segundos
      setTimeout(() => {
        hideNotification();
      }, 5000);
    }

    // Función para ocultar la ventana emergente
    function hideNotification() {
      notification.classList.remove('show');
    }

    // Ejemplo de uso
    window.addEventListener('load', () => {
      showNotification();
    });
    // Ejemplo de uso
    window.addEventListener('load', () => {
      showNotification();
    });

    window.addEventListener('load', function() {
      // Obtén una referencia a los elementos que deseas mostrar
      var elementosMostrables = document.querySelectorAll('#cajas');

      // Elimina la clase 'd-none' de los elementos para mostrarlos
      elementosMostrables.forEach(function(elemento) {
        elemento.classList.remove('d-none');
      });

      // Oculta el spinner de carga
      var spinner = document.querySelector('.spinner-border');
      spinner.style.display = 'none';
    });
  </script>
</body>

</html>