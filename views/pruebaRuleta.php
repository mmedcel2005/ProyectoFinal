<!DOCTYPE html>
<html>
<head>
  <title>Carrusel múltiple con desplazamiento de uno en uno y modal</title>
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
  <div class="item">
    <div class="card">
      <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 2</h5>
        <p class="card-text">Contenido de la tarjeta 2</p>
      </div>
    </div>
  </div>
  <!-- Resto de las tarjetas -->
</div>

<button id="randomBtn" class="btn btn-primary">Mover Carrusel</button>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalLabel">Detalles del Elemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="itemContent">
          <!-- Aquí se mostrará el contenido del elemento seleccionado -->
        </div>
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

    $('#randomBtn').click(function() {
      var randomIndex = Math.floor(Math.random() * carousel.items().length);
      carousel.trigger('to.owl.carousel', [randomIndex, 500]);
    });

    carousel.on('changed.owl.carousel', function(event) {
      var currentElement = $(event.target).find('.owl-item').eq(event.item.index).find('.card');
      var cardTitle = currentElement.find('.card-title').text();
      var cardText = currentElement.find('.card-text').text();
      $('#itemModalLabel').text(cardTitle);
      $('#itemContent').html('<p>' + cardText + '</p>');
      $('#itemModal').modal('show');
    });
  });
</script>

</body>
</html>
