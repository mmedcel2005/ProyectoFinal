<!DOCTYPE html>
<html>
<head>
  <title>Ruleta con Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
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
  <div class="container">
    <h1>Ruleta con Bootstrap</h1>
    <div id="carouselExample" class="carousel">
      <div class="carousel-item">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Item 1</h5>
            <p class="card-text">Descripción del item 1</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Item 2</h5>
            <p class="card-text">Descripción del item 2</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Item 3</h5>
            <p class="card-text">Descripción del item 3</p>
          </div>
        </div>
      </div>
      <!-- Agrega más tarjetas para más elementos de la ruleta -->
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="script.js">$(document).ready(function() {
  var carousel = $("#carouselExample");
  var modal = $("#winnerModal");

  // Configurar opciones de Slick Carousel
  carousel.slick({
    centerMode: true,
    centerPadding: "60px",
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3
        }
      },
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1
        }
      }
    ]
  });

  // Obtener el número total de elementos de la ruleta
  var itemCount = carousel.find(".carousel-item").length;

  // Agregar evento al botón de girar
  $("#spinBtn").click(function() {
    // Obtener un número aleatorio para determinar el ganador
    var winnerIndex = Math.floor(Math.random() * itemCount);

    // Desplazar la ruleta al índice ganador
    carousel.slick("slickGoTo", winnerIndex);

    // Mostrar el modal del ganador después de que finalice la animación
    setTimeout(function() {
      var winnerTitle = carousel.find(".carousel-item").eq(winnerIndex).find(".card-title").text();
      $("#winnerText").text("¡El ganador es: " + winnerTitle + "!");
      modal.modal("show");
    }, 1000); // Ajusta este tiempo de espera según la duración de la animación de giro
  });
});</script>
</body>
</html>
