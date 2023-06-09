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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    * {
  font-family: 'Open Sans', sans-serif;
}
      h1,
    h2,
    h3,
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

    .btn-amarillo:hover {
      background-color: #efb810;
      color: white;
    }

    .custom-img {
      max-width: 300px;
      height: auto;
    }

    .card-img-container {
      position: relative;
    }

    .item-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
    }

    .item-card-title,
    .item-card-text {
      margin: 0;
      font-size: 15px;
    }

    .owl-carousel {
      pointer-events: none;
    }

    .roulette-container {
      position: relative;
    }

    .roulette-line {
      position: absolute;
      left: 50%;
      top: 0;
      transform: translateX(-50%);
      width: 2px;
      height: 85%;
      background-color: #efb810;
      /* Puedes ajustar el color de la línea aquí */
      z-index: 2;
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


    <section>
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-6 col-lg-12 mb-3">
            <div class="card position-relative text-center bg-custom-sec">
              <img src="<?php echo $caja['imagen']; ?>" class="card-img-top custom-img mx-auto" alt="<?php echo $item['nombre']; ?>">
              <div class="card-body">
                <h4 class="card-text text-token"><?php echo $caja['precio']; ?></h4>

                <?php
                if ($_SESSION['cantTokens'] < $caja['precio']) {
                  print('<a href="#" class="btn btn-amarillo color-tokens col-sm-5 mx-auto" id="noSuficientesTokens">Abrir</a>');
                } else {
                  print('<a href="#" class="btn btn-amarillo color-tokens col-sm-5 mx-auto" id="randomBtn">Abrir</a>');
                }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section>
      <div class="container py-5">
        <div class="roulette-container">
          <div class="roulette-line"></div>
          <div class="owl-carousel owl-theme">
            <?php
            foreach ($itemsAleatorio as $item) {
              print('<div class="item">');
              print('<div class="card" id="item-card-' . $item['idObjeto'] . '">');
              print('    <div class="card-img-container">');
              switch ($item["calidad"]) {
                case "L":
                  print('<img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                case "E":
                  print('<img src="../src/img/bg-item-rojo.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                case "SR":
                  print('<img src="../src/img/bg-item-morado.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                case "R":
                  print('<img src="../src/img/bg-item-azul.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                case "C":
                  print('<img src="../src/img/bg-item-celeste.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                case "MC":
                  print('<img src="../src/img/bg-item-gris.png" class="card-img-top" alt="Imagen de fondo">');

                  break;
                default:
                  break;
              }
              print('        <div class="item-overlay">');
              print('       <img src="' . $item['imagen'] . '" alt="Imagen de ' . $item['nombre'] . '" class="item-image img-fluid">');
              print('           <br>');
              print('      <br><h6 class="item-card-title text-white">' . $item['nombre'] . '</h6>');
              print('      <input type="hidden" id="idItem" name="idItem-' . $item['idObjeto'] . '" value="' . $item['idObjeto'] . '">');
              print('       <h4 class="item-card-text text-token">' . $item['precio'] . ' €</h4>');
              print('        </div>');
              print('    </div>');
              print('</div>');
              print('</div>');
            }


            ?>
          </div>




        </div>
      </div>
      </div>
    </section>




    <section>
      <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 bg-custom-sec">
          <?php
          foreach ($items as $item) {
            print('<div class="col mb-4 rounded p-4">');
            print(' <div class="card">');
            print('   <div class="card-img-container">');
            switch ($item["calidad"]) {
              case "L":
                print('<img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "E":
                print('<img src="../src/img/bg-item-rojo.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "SR":
                print('<img src="../src/img/bg-item-morado.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "R":
                print('<img src="../src/img/bg-item-azul.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "C":
                print('<img src="../src/img/bg-item-celeste.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "MC":
                print('<img src="../src/img/bg-item-gris.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              default:
                break;
            }
            print('     <div class="item-overlay">');
            print('       <img src="' . $item['imagen'] . '" alt="Imagen de' . $item['nombre'] . '" class="item-image img-fluid">');
            print('      <br><h6 class="item-card-title text-white">' . $item['nombre'] . '</h6>');
            print('       <h4 class="item-card-text text-token">' . $item['precio'] . ' €</h4>');
            print('      </div>');
            print('    </div>');
            print('  </div>');
            print('</div>');
          }

          ?>
        </div>
      </div>
    </section>

    <!-- Modal item -->
    <div class="modal fade" id="itemGanado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Has ganado:</h5>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <form action="../controller/abrirCajaC.php" method="post">
              <button type="submit" value="vender" id="vender" name="vender" class="btn btn-danger">Vender</button>
              <input type="hidden" value="<?php print($caja['idCaja']); ?>" name="idCaja" id="idCaja">
              <input type="hidden" value="" name="idObjeto" id="idObjeto">
              <button type="submit" value="guardar" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal NO TIENES SUFICIENTES TOKENS-->
    <div class="modal fade" id="tokensInsuficientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">No tienes suficientes tokens</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <!-- Cuerpo del modal -->
          <div class="modal-body">
            <p>Lo sentimos, no tienes suficientes tokens para realizar esta acción.</p>
            <p>¿Deseas comprar más tokens?</p>
          </div>

          <!-- Pie del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
            <form action="../controller/tiendaTokensC.php">
              <button type="submit" class="btn btn-primary">Comprar</button>
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="ganadoTokens" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¡Has ganado tokens!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <!-- Cuerpo del modal -->
          <div class="modal-body">
            <p>Has ganado <?php print('<span class="text-token"> ' . $tokensGanados . '</span>') ?> monedas por vender tu item.</p>
          </div>

          <!-- Pie del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          </div>

        </div>
      </div>
    </div>



    <?php
    if ($notificacion == "ok") {
      print('<div id="notification" class="notification">');
      print('<span id="notification-message" class="notification-message"></span>');
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <?php if ($vendido == true) {
    print('<script>');
    print('$(document).ready(function() {');
    print("$('#ganadoTokens').modal('show');");
    print(' });');
    print(' </script>');
  }
  ?>

  <script>
    $(document).ready(function() {
      var owlCarousel = $('.owl-carousel');

      owlCarousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 2
          },
          768: {
            items: 3
          },
          992: {
            items: 4
          },
          1200: {
            items: 5
          }
        }
      });




      $('#randomBtn').click(function() {
        var carousel = $('.owl-carousel').data('owl.carousel');

        var minPositions = 13; // Número mínimo de posiciones que se debe mover la ruleta
        var maxPositions = ((carousel.items().length) * 2); // Número máximo de posiciones que se puede mover la ruleta
        var randomIndex = Math.floor(Math.random() * (maxPositions - minPositions + 1)) + minPositions;

        var currentIndex = carousel.relative(carousel.current());
        var direction = 'next';

        carousel.to(randomIndex, 500, direction);
        randomIndex = randomIndex - 9;
        var selectedItem = carousel.$stage.children().eq(randomIndex).find('.card').clone(); // Clonar la tarjeta del item seleccionado


        setTimeout(function() {
          var selectedItem = carousel.$stage.children().eq(randomIndex).find('.card').clone();
          var selectedItemId = selectedItem.find('#idItem').val();
          $('#idObjeto').val(selectedItemId);
          $('#itemGanado .modal-body').html(selectedItem); // Agregar el contenido clonado al cuerpo del modal
          $('#itemGanado').modal('show');
        }, 3000); // Tiempo de espera en milisegundos (en este caso, 3 segundos)
      });

      $('#noSuficientesTokens').click(function() {
        $('#tokensInsuficientes').modal('show');
      });
    });

    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notification-message');

    // Función para mostrar la ventana emergente con un mensaje específico
    function showNotification(message) {
      notificationMessage.textContent = message;
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
      showNotification('Accion realizada correctamente');
    });
  </script>
</body>

</html>