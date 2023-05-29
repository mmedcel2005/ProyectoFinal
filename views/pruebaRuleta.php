<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
        }

        #carouselExampleControls {
            width: 400px;
            margin: 0 auto;
        }

        #spinButton {
            margin-top: 20px;
        }

        #winnerText {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ruleta con Estilo de Carousel</h1>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="item1.jpg" class="d-block w-100" alt="Item 1">
                        </div>
                        <div class="carousel-item">
                            <img src="item2.jpg" class="d-block w-100" alt="Item 2">
                        </div>
                        <div class="carousel-item">
                            <img src="item3.jpg" class="d-block w-100" alt="Item 3">
                        </div>
                        <!-- Agrega más elementos de carousel según sea necesario -->
                    </div>
                </div>
                <button id="spinButton" class="btn btn-primary">Girar Ruleta</button>
            </div>
        </div>
    </div>

    <div id="winnerModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Felicidades!</h5>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializar el carousel
            $('#carouselExampleControls').carousel({
                interval: false
            });

            // Obtener la cantidad de elementos en el carousel
            var carouselItemsCount = $('#carouselExampleControls .carousel-item').length;

            // Girar la ruleta cuando se hace clic en el botón
            $('#spinButton').click(function() {
                var winnerIndex = Math.floor(Math.random() * carouselItemsCount); // Generar un índice aleatorio para seleccionar el ganador
                $('#carouselExampleControls').carousel('pause'); // Pausar el carousel
                $('#carouselExampleControls').carousel(winnerIndex); // Mover el carousel al índice del ganador

                // Mostrar el modal del ganador después de que se detenga la animación
                setTimeout(function() {
                    var winnerText = $('#carouselExampleControls .carousel-item.active img').attr('alt');
                    $('#winnerText').text('¡Has ganado ' + winnerText + '!');
                    $('#winnerModal').modal('show');
                }, 4000); // Ajusta el valor de tiempo en milisegundos según la duración de la animación
            });
        });
    </script>
</body>
</html>
