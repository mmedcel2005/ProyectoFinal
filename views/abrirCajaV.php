<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE | Inicio</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../style/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
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
    <!--------------- NAV BOXES  --------------->


    <section>
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-6 col-lg-12 mb-3">
            <div class="card position-relative text-center bg-custom-sec">
              <img src="<?php echo $caja['imagen']; ?>" class="card-img-top custom-img mx-auto" alt="<?php echo $item['nombre']; ?>">
              <div class="card-body">
                <h5 class="card-text text-token"><?php echo $item['precio']; ?></h5>
                <a href="#" class="btn btn-amarillo color-tokens col-sm-5 mx-auto" id="randomBtn">Abrir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section>
      <div class="owl-carousel owl-theme">
            <?php
            foreach ($itemsAleatorio as $item) {
              print('<div class="item">');
              print('<div class="card">');
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
              print('       <img src="' . $item['imagen'] . '" alt="' . $item['nombre'] . '" class="item-image img-fluid">');
              print('           <br>');
              print('      <br><h6 class="item-card-title text-white">' . $item['nombre'] . '</h6>');
              print('       <h4 class="item-card-text text-token">' . $item['precio'] . '</h4>');
              print('        </div>');
              print('    </div>');
              print('</div>');
              print('</div>');
            }
            ?>
        </div>
        
        


      </div>
    </section>




    <section>
      <div class="container py-5 ">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5">
          <?php
          foreach ($items as $item) {
            print('<div class="col mb-4">');
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
            print('       <img src="' . $item['imagen'] . '" alt="' . $item['nombre'] . '" class="item-image img-fluid">');
            print('      <br><h6 class="item-card-title text-white">' . $item['nombre'] . '</h6>');
            print('       <h4 class="item-card-text text-token">' . $item['precio'] . '</h4>');
            print('      </div>');
            print('    </div>');
            print('  </div>');
            print('</div>');
          }
          ?>

        </div>
      </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                            <div class="bg-image hover-overlay hover-zoom ripple rounded position-relative" data-mdb-ripple-color="light">
                                <img src="../src/img/bg-item-amarillo.png" class="w-100" alt="Imagen de fondo" />
                                <img src="<?php echo $item["imagen"]; ?>" class="position-absolute top-0 start-0 w-100 h-100" alt="Imagen de <?php echo $item["nombre"]; ?>" />
                                <a href="#!">
                                    <div class="mask"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                            <p><?php echo $item["nombre"]; ?></p>
                            <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                                <i class="bi bi-send-fill"></i>
                            </button>
                            <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Move to the wish list">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <p class="text-start text-md-center">
                                <strong class="text-token"><?php echo $item["precio"]; ?> €</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

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
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
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
        var randomIndex = Math.floor(Math.random() * carousel.items().length);
        var currentIndex = carousel.relative(carousel.current());
        var direction = 'next';

        carousel.to(randomIndex, 500, direction);

        setTimeout(function() {
          $('#myModal').modal('show');
        }, 3000); // Tiempo de espera en milisegundos (en este caso, 3 segundos)
      });
    });
  </script>
</body>

</html>