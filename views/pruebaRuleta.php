<!DOCTYPE html>
<html>
<head>
  <title>Ruleta con Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
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
 <!-- Código HTML -->
<div class="container">
  <h1>Ruleta con bootstrap</h1>
  <p>Pulsa el botón para girar la ruleta y ver el ítem ganador.</p>
  <button id="spin-button" class="btn btn-primary">Girar</button>
  <div id="roulette" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title">Ítem 1</h5>
            <p class="card-text">Este es el ítem 1.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card bg-secondary text-white">
          <div class="card-body">
            <h5 class="card-title">Ítem 2</h5>
            <p class="card-text">Este es el ítem 2.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Ítem 3</h5>
            <p class="card-text">Este es el ítem 3.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <h5 class="card-title">Ítem 4</h5>
            <p class="card-text">Este es el ítem 4.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title">Ítem 5</h5>
            <p class="card-text">Este es el ítem 5.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="winner-modal" class="modal fade" tabindex="-1" aria-labelledby="winner-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="winner-modal-label" class="modal-title">¡Felicidades!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="winner-modal-body" class="modal-body">
          <!-- Aquí se mostrará el ítem ganador -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Código CSS -->
<style>
  /* Estilos para el carousel */
  #roulette {
    width: 300px;
    height: 300px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
    transform: rotate(45deg);
  }

  .carousel-item {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .card {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    transform: rotate(-45deg);
  }

</style>

<!-- Código JavaScript -->
<script>
  // Variables globales
  var roulette = $("#roulette"); // El elemento carousel
  var spinButton = $("#spin-button"); // El botón para girar la ruleta
  var winnerModal = $("#winner-modal"); // El modal para mostrar el ítem ganador
  var winnerModalBody = $("#winner-modal-body"); // El cuerpo del modal
  var items = roulette.find(".carousel-item"); // Los ítems del carousel
  var numItems = items.length; // El número de ítems
  var spinning = false; // Indica si la ruleta está girando o no
  var spinInterval; // El intervalo para girar la ruleta
  var spinDuration = 3000; // La duración del giro en milisegundos
  var spinSpeed = 100; // La velocidad del giro en milisegundos

  // Función para girar la ruleta
  function spinRoulette() {
    if (!spinning) { // Si la ruleta no está girando, empezar a girarla
      spinning = true; // Cambiar el estado a girando
      spinButton.prop("disabled", true); // Deshabilitar el botón para evitar múltiples clicks
      spinInterval = setInterval(function() { // Crear un intervalo para cambiar el ítem activo cada cierto tiempo
        var activeItem = roulette.find(".carousel-item.active"); // Encontrar el ítem activo actual
        var nextItem = activeItem.next(); // Encontrar el siguiente ítem
        if (nextItem.length == 0) { // Si no hay más ítems, volver al primero
          nextItem = items.first();
        }
        activeItem.removeClass("active"); // Quitar la clase activa al ítem actual
        nextItem.addClass("active"); // Añadir la clase activa al siguiente ítem
      }, spinSpeed); // Ejecutar el intervalo cada cierto tiempo según la velocidad del giro
      setTimeout(function() { // Crear un temporizador para detener el giro después de cierta duración
        clearInterval(spinInterval); // Limpiar el intervalo
        spinning = false; // Cambiar el estado a no girando
        spinButton.prop("disabled", false); // Habilitar el botón de nuevo
        showWinner(); // Mostrar el ítem ganador
      }, spinDuration); // Ejecutar el temporizador según la duración del giro
    }
  }

  // Función para mostrar el ítem ganador
  function showWinner() {
    var winnerItem = roulette.find(".carousel-item.active"); // Encontrar el ítem activo que es el ganador
    var winnerContent = winnerItem.find(".card").clone(); // Clonar el contenido del ítem ganador
    winnerContent.css("transform", "rotate(0)"); // Quitar la rotación del contenido clonado
    winnerModalBody.empty(); // Vaciar el cuerpo del modal
    winnerModalBody.append(winnerContent); // Añadir el contenido clonado al cuerpo del modal
    winnerModal.modal("show"); // Mostrar el modal
  }

  // Evento para girar la ruleta al pulsar el botón
  spinButton.on("click", function() {
    spinRoulette();
  });

</script>

</body>
</html>
