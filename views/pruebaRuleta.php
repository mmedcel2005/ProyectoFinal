<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruleta Bootstrap</title>
  <!-- Agrega los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <!-- Agrega los estilos de Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    .card {
      width: 200px;
      height: 300px;
      margin: 10px;
      text-align: center;
      background-color: #f8f9fa;
    }

    #carouselExample {
      overflow: hidden;
    }
    
    #modalWinner {
      text-align: center;
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

        // Deshabilitar el carrusel durante el giro
        $('#carouselExample').carousel('pause');

        // Agregar clase de animación a las tarjetas
        cards.addClass('animate__animated animate__fadeOut');

        setTimeout(function() {
          // Detener el carrusel en la tarjeta seleccionada
          $('#carouselExample').carousel(randomIndex);

          // Mostrar el modal con el elemento ganador
          var winner = cards[randomIndex].querySelector('.card-title').innerText;
          $('#modalWinner').text('¡El ganador es: ' + winner + '!');
          $('#winnerModal').modal('show');
        }, 2000); // Esperar 2 segundos antes de detener el carrusel y mostrar el resultado
      });

      // Restablecer las tarjetas y reanudar el carrusel después de que se oculte el modal
      $('#winnerModal').on('hidden.bs.modal', function() {
        cards.removeClass('animate__animated animate__fadeOut');
        $('#carouselExample').carousel('cycle');
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
