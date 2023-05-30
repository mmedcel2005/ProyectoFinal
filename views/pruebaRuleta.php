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
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div><div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div><div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div><div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div><div class="item">
            <div class="card">
                <div class="card-img-container">
                    <img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">
                    <div class="item-overlay">
                        <img src="<?php echo $item['imagen']; ?>" alt="I<?php echo $item['nombre']; ?>" class="item-image img-fluid">
                        <br>
                        <h6 class="item-card-title text-white"><?php echo $item['nombre']; ?></h6>
                        <h4 class="item-card-text text-token"><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="randomBtn" class="btn btn-primary">Mover Carrusel</button>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                            <div class="bg-image hover-overlay hover-zoom ripple rounded position-relative" data-mdb-ripple-color="light">
                                <img src="../src/img/bg-item-amarillo.png" class="w-100" alt="Imagen de fondo" />
                                <img src="<?php echo $item["imagen"]; ?>" class="position-absolute top-0 start-0 w-100 h-100" alt="Imagen de <?php echo $item["nombre"]; ?>" />
                                <a href="#!">
                                    <div class="mask"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                            <p><?php echo $item["nombre"]; ?></p>
                            <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                                <i class="bi bi-send-fill"></i>
                            </button>
                            <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Move to the wish list">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <p class="text-start text-md-center">
                                <strong class="text-token"><?php echo $item["precio"]; ?> €</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
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

            $('#randomBtn').click(function() {
                var carousel = $('.owl-carousel').data('owl.carousel');
                var randomIndex = Math.floor(Math.random() * carousel.items().length);
                var currentIndex = carousel.relative(carousel.current());
                var direction = 'next';

                carousel.to(randomIndex, 500, direction);

                setTimeout(function() {
                    $('#myModal').modal('show');
                }, 3000); // Tiempo de espera en milisegundos (en este caso, 3 segundos)
            });
        });
    </script>

</body>

</html>