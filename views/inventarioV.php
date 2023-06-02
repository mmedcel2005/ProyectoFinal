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
            <div class="container-fluid">
                <a class="nav-link" href="../index.php">
                    <img src="..\src\img\logoXL.png" alt="" style="height: 40px" />
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php"><b>Mistery Boxes</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>Oro gratis</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controller/tiendaTokensC.php"><b>Tienda</b></a>
                        </li>
                        <li class="nav-item"></li>
                    </ul>

                    <?php
                    print('<div class="d-flex mx-lg-5">');
                    print('<a class="nav-link" href="../controller/usuarioC.php"><img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 50px;" />');
                    print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span> <br /> <p class="text-token"> <b>' . $_SESSION['cantTokens'] . ' </b></p>');
                    print("</a></div>");
                    print("");

                    ?>
                    <div id="google_translate_element" class="google"></div>
                </div>
            </div>
        </nav>
    </header>


    <main>
        <section>
            <div class="container py-5">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 bg-custom-sec text-white">

                            <div class="card-header py-3">
                                <h5 class="mb-0">Inventario</h5>
                            </div>
                            <div class="card-body">

                                <?php
                                if ($objetosIntoInventario == null || (count($objetosIntoInventario)) < 1) {
                                    print('<div class="row">');
                                    print('<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">');

                                    print('</div>');

                                    print('<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">');
                                    print('<h3>El inventario esta vacio</h3>');
                                    print('</div>');

                                    print('<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">');



                                    print('</div>');
                                    print('</div>');
                                } else {
                                    $totalItems = count($objetosIntoInventario);

                                    foreach ($objetosIntoInventario as $key => $item) {
                                        print('<div class="row">');
                                        print('<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">');
                                        print('    <div class="bg-image hover-overlay hover-zoom ripple rounded position-relative" data-mdb-ripple-color="light">');
                                        switch ($item["calidad"]) {
                                            case "L":
                                                print('        <img src="../src/img/bg-item-amarillo.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            case "E":
                                                print('        <img src="../src/img/bg-item-rojo.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            case "SR":
                                                print('        <img src="../src/img/bg-item-morado.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            case "R":
                                                print('        <img src="../src/img/bg-item-azul.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            case "C":
                                                print('        <img src="../src/img/bg-item-celeste.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            case "MC":
                                                print('        <img src="../src/img/bg-item-gris.png" class="w-100" alt="Imagen de fondo" />');

                                                break;
                                            default:
                                                break;
                                        }
                                        print('        <img src="' . $item["imagen"] . '" class="position-absolute top-0 start-0 w-100 h-100" alt="Imagen de ' . $item["nombre"] . '" />');
                                        print('        <a href="#!">');
                                        print('            <div class="mask"></div>');
                                        print('        </a>');
                                        print('    </div>');
                                        print('</div>');

                                        print('<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">');
                                        print('    <p>' . $item["nombre"] . '</p>');
                                        print('<p> <span style="color: red;">x ' . $item["cantidad"] . '</span> </p>');



                                        print('<button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#enviar" data-value="' . $item['idObjeto'] . '">');
                                        print('    <i class="bi bi-send-fill text-white"></i>');
                                        print('</button>');

                                        print('<button class="btn" onclick="vender(this)" type="button" value="' . $item['idObjeto'] . '">');
                                        print('    <i class="bi bi-heart-fill text-white"></i>');
                                        print('</button>');

                                        print('</div>');

                                        print(' <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">');

                                        print('      <p class="text-start text-md-center">');
                                        print('       <strong class="text-token">' . $item["precio"] . ' €</strong>');
                                        print('    </p>');
                                        print('</div>');
                                        print('</div>');

                                        if ($key != $totalItems - 1) {
                                            // No es el último elemento, realizar acción adicional
                                            print('<hr class="my-4">');
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <div class="modal fade" id="confirmacionVender" tabindex="-1" aria-labelledby="confirmacionVenderLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <p>¿Seguro que quieres vender el objeto?.</p>
                    </div>

                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="text" id="inputValor" class="form-control" readonly>
                        <button type="button" class="btn btn-primary">Vender</button>

                    </div>

                </div>
            </div>
        </div>



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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var enviarModal = document.getElementById('enviar');
        enviarModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var value = button.getAttribute('data-value');
            document.getElementById('inputValor').value = value;
        });

        var venderModal = document.getElementById('vender');
        venderModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var value = button.getAttribute('data-value');
            document.getElementById('inputValor').value = value;
        });

        function vender(button) {
            var idObjeto = button.value;
            console.log("ID del objeto: " + idObjeto);

            document.getElementById('inputValor').value = idObjeto;

            // Aquí puedes continuar con el código para mostrar el modal o realizar otras acciones
            $('#confirmacionVender').modal('show');
        }
    </script>
</body>

</html>