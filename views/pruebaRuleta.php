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
    .container {
  margin-top: 50px;
}

h1 {
  text-align: center;
}

.card {
  width: 300px;
  margin: 0 auto;
}

#spinBtn {
  display: block;
  margin: 20px auto;
  text-align: center;
}

.modal {
  display: none;
  text-align: center;
}

.modal-content {
  margin-top: 20px;
}

#winnerText {
  font-size: 24px;
  font-weight: bold;
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

  <body>
  <div class="container">
    <h1>Ruleta con Bootstrap</h1>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 1</h5>
                  <p class="card-text">Descripción del item 1</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 2</h5>
                  <p class="card-text">Descripción del item 2</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 3</h5>
                  <p class="card-text">Descripción del item 3</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 3</h5>
                  <p class="card-text">Descripción del item 4</p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 3</h5>
                  <p class="card-text">Descripción del item 5</p>
                </div>
              </div>
            </div>


            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 3</h5>
                  <p class="card-text">Descripción del item 6</p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 3</h5>
                  <p class="card-text">Descripción del item 7</p>
                </div>
              </div>
            </div>
            <!-- Agrega más tarjetas para más elementos de la ruleta -->
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 4</h5>
                  <p class="card-text">Descripción del item 4</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 5</h5>
                  <p class="card-text">Descripción del item 5</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Item 6</h5>
                  <p class="card-text">Descripción del item 6</p>
                </div>
              </div>
            </div>
            <!-- Agrega más tarjetas para más elementos de la ruleta -->
          </div>
        </div>
        <!-- Agrega más slides para más elementos de la ruleta -->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
    <button id="spinBtn" class="btn btn-primary">Girar</button>
  </div>

  <div id="winnerModal" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¡Ganador!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="winnerText"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <script>
    $(document).ready(function() {
  var carousel = $("#carouselExampleControls");
  var modal = $("#winnerModal");

  // Configurar opciones de Bootstrap Carousel
  carousel.carousel({
    interval: false
  });

  // Obtener el número total de elementos de la ruleta
  var itemCount = carousel.find(".carousel-item").length;

  // Agregar evento al botón de girar
  $("#spinBtn").click(function() {
    // Obtener un número aleatorio para determinar el ganador
    var winnerIndex = Math.floor(Math.random() * itemCount);

    // Detener la ruleta en el índice ganador
    carousel.carousel(winnerIndex);

    // Mostrar el modal del ganador después de que finalice la animación
    setTimeout(function() {
      var winnerTitle = carousel.find(".carousel-item").eq(winnerIndex).find(".card-title").text();
      $("#winnerText").text("¡El ganador es: " + winnerTitle + "!");
      modal.modal("show");
    }, 1000); // Ajusta este tiempo de espera según la duración de la animación de giro
  });
});
  </script>
</body>

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