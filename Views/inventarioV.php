<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOMBRE | Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #1c1c1c;
        }

        .bg-custom {
            background-color: #121212;
        }

        .bg-custom-sec {
            background-color: #2b2b2b;
        }

        .imagen-superpuesta {
            top: 0;
            right: 0;
            max-width: 50px;
            /* Ajusta el ancho máximo de la imagen superpuesta */
            width: 100%;
            /* Asegura que la imagen ocupe todo el ancho del contenedor */
            height: auto;
            /* Ajusta la altura automáticamente */
        }

        .text-token {
            color: #efb810;
        }

        .btn-amarillo {
            background-color: #efb810;
        }
    </style>
</head>

<body>
    <header>
        <!--------------- NAV  --------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Mistery Boxes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Oro gratis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="usuario.jpg" alt="Imagen de usuario" class="rounded-circle usuario-imagen">
                            <span class="usuario-nombre">Nombre de Usuario</span> <br>
                            <span class="usuario-monedas">100 Monedas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="container py-5">


                <div class="row">
                    <div class="col-lg-16">
                        <div class="card mb-4 bg-custom-sec text-white">

                            <div class="card-header py-3">
                                <h5 class="mb-0">Inventario</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="" class="w-100 " alt="" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong></strong></p>
                                        <p>Nombre
                                        </p>


                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="bi bi-send-fill"></i>
                                        </button>
                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Move to the wish list">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">


                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong class="text-token">Precio€</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="" class="w-100 " alt="" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong></strong></p>
                                        <p>Nombre
                                        </p>


                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="bi bi-send-fill"></i>
                                        </button>
                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Move to the wish list">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">


                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong class="text-token">Precio€</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="" class="w-100 " alt="" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong></strong></p>
                                        <p>Nombre
                                        </p>


                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="bi bi-send-fill"></i>
                                        </button>
                                        <button type="button" class="featured_button" data-mdb-toggle="tooltip" title="Move to the wish list">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">


                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong class="text-token">Precio€</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h5>Ver mas</h3>
                            </div>
                        </div>

                    </div>









                </div>
            </div>
        </section>
    </main>
    <!--------------- FOOTER  --------------->

    <footer class="bg-custom text-center text-white" id="contact_footer">
        <br>
        <div class="d-flex justify-content-around">
            <div>
                <h3>Contacto</h3>
                <p>
                    <i class="bi bi-facebook"></i> Facebok<br>
                    <i class="bi bi-instagram"></i> Instagram<br>
                    <i class="bi bi-twitter"></i> Twitter<br>
                    <i class="bi bi-envelope"></i> support@ejemplo.com<br>
                    <i class="bi bi-telephone-fill"></i> +34 45 67 23 45<br>
                </p>
            </div>
            <div>
                <h3>Información</h3>
                <p>
                    <a href=""> Politicas y preguntas</a><br>
                    <a href=""> Politicas y preguntas</a><br>
                    <a href=""> Politicas y preguntas</a><br>
                    <a href=""> Politicas y preguntas</a><br>
                    <a href=""> Politicas y preguntas</a>

                </p>
            </div>
            <div>
                <h3>Formas de pago</h3>
                <p>
                    897 87 78 23<br>
                    654 98 65 09<br>
                    789 09 39 85
                </p>
            </div>
        </div>

        <div class="text-center p-3">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Manuel Medina</a>
        </div>
    </footer>
</body>

</html>