<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruleta Bootstrap</title>
  <!-- Agrega los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <style>
    .card {
      width: 200px;
      height: 300px;
      margin: 10px;
      text-align: center;
      background-color: #f8f9fa;
    }
    
    #modalWinner {
      text-align: center;
    }
    
    .carousel.slide .carousel-inner {
      display: flex;
    }
    
    .carousel.slide .carousel-item {
      flex: 1 0 100%;
      transition: transform 3s ease-in-out;
    }
    
    .carousel.slide .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) {
      transform: translateX(0);
    }
    
    .carousel.slide .carousel-item-next:not(.carousel-item-left) {
      transform: translateX(100%);
    }
    
    .carousel.slide .carousel-item-prev:not(.carousel-item-right) {
      transform: translateX(-100%);
    }
    
    .carousel.slide .carousel-item-right,
    .carousel.slide .carousel-item-left {
      transform: translateX(0);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Ruleta Bootstrap</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 1</h5>
                  <p class="card-text">Descripción del elemento 1</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 2</h5>
                  <p class="card-text">Descripción del elemento 2</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 3</h5>
                  <p class="card-text">Descripción del elemento 3</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 4</h5>
                  <p class="card-text">Descripción del elemento 4</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 5</h5>
                  <p class="card-text">Descripción del elemento 5</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Elemento 6</h5>
                  <p class="card-text">Descripción del elemento 6</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button id="spinBtn" class="btn btn-primary mt-3">¡Girar!</button>
  </div>

  <!-- Agrega los scripts de Bootstrap y jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Inicializar el carrusel
      $('#carouselExample').carousel({
        interval: false // Deshabilitar el auto-giro
      });

      // Obtener las tarjetas del carrusel
      var cards = $('.carousel-item .card');

      // Manejar el evento click del botón
      $('#spinBtn').click(function() {
        // Generar un índice aleatorio para seleccionar una tarjeta
        var randomIndex = Math.floor(Math.random() * cards.length);

        // Detener el carrusel y mostrar el ganador después de 3 segundos
        $('#carouselExample').carousel('pause');
        setTimeout(function() {
          // Mostrar el modal con el elemento ganador
          var winner = cards[randomIndex].querySelector('.card-title').innerText;
          $('#modalWinner').text('¡El ganador es: ' + winner + '!');
          $('#winnerModal').modal('show');
        }, 3000);

        // Girar el carrusel
        $('#carouselExample').carousel('next');
      });
    });
  </script>

  <!-- Modal para mostrar el elemento ganador -->
  <div id="winnerModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Elemento Ganador</h5>
        </div>
        <div class="modal-body" id="modalWinner">
          ¡El ganador es: !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
