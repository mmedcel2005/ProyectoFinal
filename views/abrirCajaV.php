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

    .card-title,
    .card-text {
      margin: 0;
      font-size: 12px;
    }
  </style>
</head>

<body>
  <header>
    <!--------------- NAV  --------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
      <div class="container-fluid">
        <a class="nav-link" href="./index.html">
          <img src="..\src\img\logoXL.png" alt="" style="height: 40px" />
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

          <?php
          print('<div class="d-flex mx-lg-5">');
          print('<a class="nav-link" href="usuarioV.php"><img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 50px;" />');
          print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span> <br /> <p class="text-token"> <b>' . $_SESSION['cantTokens'].' </b></p>');
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
                <a href="#" class="btn btn-amarillo color-tokens col-sm-5 mx-auto" id="btnGirar">Abrir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


      <section>
        <div class="container py-5">


          <div class="row justify-content-center">
            <div class="col-md-6">
              <div id="ruleta" class="card-deck d-flex justify-content-center">
                <?php foreach ($items as $item) : ?>

                  <div class="card">
              <div class="card-img-container">
              <?php echo $item['descripcion']; ?>
                <img src="<?php switch($item["calidad"]){
                  case "L":
                    echo "../src/img/bg-item-amarillo.png";
                    break;
                    case "E":
                      echo "../src/img/bg-item-rojo.png";
                      break;
                      case "SR":
                        echo "../src/img/bg-item-morado.png";
                        break;
                        case "R":
                          echo "../src/img/bg-item-azul.png";
                          break;
                          case "C":
                            echo "../src/img/bg-item-celeste.png";
                            break;
                            case "MC":
                              echo "../src/img/bg-item-gris.png";
                              break;
                              default:
                              break;
                } ?>" class="card-img-top" alt="Imagen de fondo">
                <div class="item-overlay">
                  <img src="<?php echo $item['imagen']; ?>" alt="Imagen del<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                  <h6 class="card-title text-white"><?php echo $item['nombre']; ?></h6>
                  <p class="card-text"><?php echo $item['precio']; ?></p>
                </div>
              </div>
            </div>
                  <div class="card">
                    <img src="<?php echo $item['imagen']; ?>" class="card-img-top" alt="Imagen del item">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $item['nombre']; ?></h5>
                      <p class="card-text"><?php echo $item['descripcion']; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>


        </div>
      </section>


    <section>
      <div class="container py-5 ">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5">
          <div class="col mb-4">
          <?php foreach ($items as $item) 
            print('<div class="card">');
            print('<div class="card-img-container">');
            switch($item["calidad"]){
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

            print('<img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">');
            print('<div class="item-overlay">');
            print('<img src="../src/img/item/30W USB-C Power Adapter.png" alt="Imagen del item" class="item-image img-fluid">');
            print('<h6 class="card-title text-white">Nombre del item</h6>');
            print('<p class="card-text">Precio</p>');
            print('</div>');
            print('</div>');
            print('</div>');
            ?>
            php
          </div>
          <!-- Aquí van las demás tarjetas -->
        </div>
      </div>
    </section>

    <section>
      <!-- Agrega este código al final de tu vista -->
      <div class="modal fade" id="modalGanador" tabindex="-1" role="dialog" aria-labelledby="modalGanadorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalGanadorLabel">Objeto Ganador</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="" alt="Imagen del objeto" id="ganadorImagen">
              <h5 class="modal-title" id="ganadorNombre"></h5>
              <p id="ganadorDescripcion"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

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
<script>
  $(document).ready(function() {
    var ruleta = document.getElementById('ruleta');
    var btnGirar = document.getElementById('btnGirar');

    // Girar la ruleta al hacer clic en el botón
    btnGirar.addEventListener('click', function() {
      var ganador = obtenerGanador();

      // Deshabilitar el botón para evitar múltiples giros
      btnGirar.disabled = true;

      // Girar la ruleta durante 3 segundos
      ruleta.classList.add('girando');
      setTimeout(function() {
        ruleta.classList.remove('girando');

        // Mostrar el modal con el objeto ganador
        $('#modalGanador').modal('show');

        // Habilitar el botón nuevamente
        btnGirar.disabled = false;
      }, 3000);
    });

    // Función para obtener un objeto ganador aleatorio
    function obtenerGanador() {
      var indiceGanador = Math.floor(Math.random() * <?php echo count($items); ?>);
      return <?php echo json_encode($items); ?>[indiceGanador];
    }
  });
</script>
</script>

</html>