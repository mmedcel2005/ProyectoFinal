<!DOCTYPE html>
<html>
<head>
    <title>Ruleta con Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .carousel-inner .carousel-item {
            transition: transform 1s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ruleta con Bootstrap</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <!-- Agrega más indicadores si es necesario -->
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imagen1.jpg" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imagen2.jpg" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imagen3.jpg" alt="Slide 3">
                </div>
                <!-- Agrega más elementos de carrusel si es necesario -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="winnerModal" tabindex="-1" role="dialog" aria-labelledby="winnerModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="winnerModalLabel">¡El ítem ganador es!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="winnerItem"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var carousel = $("#carouselExampleIndicators");

            // Generar un número aleatorio para detener el carrusel
            var randomStop = Math.floor(Math.random() * carousel.find(".carousel-item").length);

            carousel.carousel({
                interval: 100,  // Ajusta la velocidad de la animación del carrusel
                wrap: false
            }).on("slid.bs.carousel", function (e) {
                var currentIndex = $(e.target).find(".carousel-item.active").index();

                // Detener el carrusel cuando alcance el índice aleatorio
                if (currentIndex === randomStop) {
                    carousel.carousel("pause");
                    var winnerItem = carousel.find(".carousel-item").eq(currentIndex).find("img").attr("alt");
                    $("#winnerItem").text(winnerItem);
                    $("#winnerModal").modal("show");
                }
            });
        });
    </script>
</body>
</html>
