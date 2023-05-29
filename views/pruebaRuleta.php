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
  <div class="item">
    <div class="card">
      <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 2</h5>
        <p class="card-text">Contenido de la tarjeta 2</p>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card">
      <img src="imagen3.jpg" class="card-img-top" alt="Imagen 3">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 3</h5>
        <p class="card-text">Contenido de la tarjeta 3</p>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card">
      <img src="imagen4.jpg" class="card-img-top" alt="Imagen 4">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 4</h5>
        <p class="card-text">Contenido de la tarjeta 4</p>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card">
      <img src="imagen5.jpg" class="card-img-top" alt="Imagen 5">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 5</h5>
        <p class="card-text">Contenido de la tarjeta 5</p>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card">
      <img src="imagen6.jpg" class="card-img-top" alt="Imagen 6">
      <div class="card-body">
        <h5 class="card-title">Tarjeta 6</h5>
        <p class="card-text">Contenido de la tarjeta 6</p>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
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
  });
</script>

</body>
</html>

