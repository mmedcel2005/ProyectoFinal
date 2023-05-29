<!DOCTYPE html>
<html>
<head>
  <title>Carrusel múltiple con desplazamiento de uno en uno</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>

<div class="owl-carousel owl-theme"> 
  <div class="item">
    <div class="card">
      <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 1</h5>
        <p class="card-text">Contenido de la tarjeta 1</p>
      </div>
    </div>
  </div>
  <!-- Resto de las tarjetas -->
</div>

<button id="randomBtn" class="btn btn-primary">Mover Carrusel</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal content goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
    var carousel = $('.owl-carousel').owlCarousel({
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

    carousel.on('translated.owl.carousel', function(event) {
      // El carrusel se ha detenido después de moverse
      // Abre el modal aquí
      $('#myModal').modal('show');
    });

    $('#randomBtn').click(function() {
      var randomIndex = Math.floor(Math.random() * carousel.items().length);
      var currentIndex = carousel.relative(carousel.current());
      var direction = 'next';
      carousel.to(randomIndex, 500, direction);
    });
  });
</script>

</body>
</html>
