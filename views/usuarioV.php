<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOMBRE | Inicio</title>
    <link rel="icon" href="../src/img/logo-Mini.png" type="image/x-icon">
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

        .btn-link {
            text-decoration: none;
        }

        
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        .notification.show {
            display: block;
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
              <a class="nav-link" href="../controller/tiendaTokensC.php"><b>Tienda</b></a>
            </li>
            <li class="nav-item"></li>
          </ul>

          <?php
          print('<div class="d-flex flex-column mx-lg-5">');
          print('<a class="nav-link" href="../controller/usuarioC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="' . $_SESSION['imagen'] . '" alt="Imagen de usuario" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<span class="usuario-nombre text-white">' . $_SESSION['nombre'] . '</span>');
          print('</div>');
          print('</a>');

          print('<a class="nav-link mt-2" href="../controller/tiendaTokensC.php">');
          print('<div class="d-flex align-items-center">');
          print('<img src="../src/img/token.png" alt="Imagen de token" class="rounded-circle usuario-imagen" style="max-width: 40px;" />');
          print('<p class="text-token"><b>' . $_SESSION['cantTokens'] . '</b></p>');
          print('</div>');
          print('</a>');

          print('</div>');


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
                    <div class="col-lg-4">
                        <div class="card mb-4 bg-custom-sec">
                            <div class="card-body text-center text-white">
                                <img src="<?php echo ($_SESSION["imagen"]) ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <?php
                                print('<h5 class="my-3">' . $usuario["nombre"] . ' ' . $usuario["apellidos"] . '</h5>');
                                ?>
                                <div class="d-flex justify-content-center mb-2">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4 bg-custom-sec text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre Completo</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php
                                        print('<p class="text-muted mb-0">' . $usuario["nombre"] . ' ' . $usuario["apellidos"] . '</p>');
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php
                                        print('<p class="text-muted mb-0">' . $usuario["correo"] . '</p>');
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telefono</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php
                                        if ($usuario["telefono"] != null) {
                                            print('<p class="text-muted mb-0">' . $usuario["telefono"] . '</p>');
                                        } else {
                                            print('<p class="text-muted mb-0">-</p>');
                                        }                                        ?>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Direccion Usuada</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php

                                        if ($usuario["direccion"] != null) {
                                            print('<p class="text-muted mb-0">' . $usuario["direccion"] . ', ' . $usuario["codigo_postal"] . ', ' . $usuario["ciudad"] . ', ' . $usuario["provincia"] . ', ' . $usuario["pais"] . '</p>');
                                        } else {
                                            print('<p class="text-muted mb-0">-</p>');
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4 bg-custom-sec">
                            <div class="card-body text-white">
                                <div class="row">
                                    <form action="../controller/editarPerfilC.php" method="post">
                                        <button class="btn btn-link text-white">Editar perfil</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <form action="../controller/editarPerfilC.php" method="post">
                                        <button class="btn btn-link text-white">Historial de recompensas</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <form action="../controller/editarPerfilC.php" method="post">
                                        <button class="btn btn-link text-white">Historial de venta</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <form action="../controller/enviadosC.php" method="post">
                                        <button class="btn btn-link text-white">Mis envios</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <form action="../controller/editarPerfilC.php" method="post">
                                        <button class="btn btn-link text-white">Soporte</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <form action="../controller/loginC.php" method="post">
                                        <button class="btn btn-link text-white" name="cerrarSesion" id="cerrarSesion" value="cerrarSesion">Cerrar sesion</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tambien podria interesarte -->
                    <div class="col-lg-8">
                        <div class="card mb-4 bg-custom-sec text-white">

                            <div class="card-header py-3">
                                <h5 class="mb-0">Inventario</h5>
                            </div>
                            <div class="card-body">


                                <?php
                                if ($objetosIntoInventario == null) {
                                    print('<div class="row">');
                                    print('<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">');

                                    print('</div>');

                                    print('<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">');
                                    print('<h3>El inventario esta vacio</h3>');
                                    print('</div>');

                                    print('<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">');



                                    print('</div>');
                                    print('</div>');
                                }elseif ((count($objetosIntoInventario) > 3)) {
                                    for ($i = 0; $i < 3; $i++) {
                                        print('<div class="row">');
                                        print('<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">');
                                        print('    <div class="bg-image hover-overlay hover-zoom ripple rounded position-relative" data-mdb-ripple-color="light">');
                                        switch ($objetosIntoInventario[$i]["calidad"]) {
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
                                        print('        <img src="' . $objetosIntoInventario[$i]["imagen"] . '" class="position-absolute top-0 start-0 w-100 h-100" alt="Imagen de ' . $objetosIntoInventario[$i]["nombre"] . '" />');
                                        print('        <a href="#!">');
                                        print('            <div class="mask"></div>');
                                        print('        </a>');
                                        print('    </div>');
                                        print('</div>');

                                        print('<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">');
                                        print('    <p>' . $objetosIntoInventario[$i]["nombre"] . '</p>');

                                        print('</div>');

                                        print(' <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">');

                                        print('      <p class="text-start text-md-center">');
                                        print('       <strong class="text-token">' . $objetosIntoInventario[$i]["precio"] . ' €</strong>');
                                        print('    </p>');
                                        print('</div>');
                                        print('</div>');
                                        print('<hr class="my-4">');
                                    }
                                    print('<h5><a href="../controller/inventarioC.php" class="text-decoration-none text-white">Ver más</a></h5>');
                                }else {
                                    foreach ($objetosIntoInventario as $item) {
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
                                        print('</div>');

                                        print(' <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">');

                                        print('      <p class="text-start text-md-center">');
                                        print('       <strong class="text-token">' . $item["precio"] . ' €</strong>');
                                        print('    </p>');
                                        print('</div>');
                                        print('</div>');
                                        print('<hr class="my-4">');
                                    }
                                    print('<h5><a href="../controller/inventarioC.php" class="text-decoration-none text-white">Ver más</a></h5>');
                                }

                                ?>
                            </div>
                        </div>

                    </div>
                </div>






            </div>
            </div>
        </section>

        <?php
        if ($mensaje == "ok") {
            print('<div id="notification" class="notification">');
            print('<span id="notification-message" class="notification-message">Modificado correctamente</span>');
            print('</div>');
        }
        ?>

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
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notification-message');

        // Función para mostrar la ventana emergente con un mensaje específico
        function showNotification() {
            notification.classList.add('show');

            // Ocultar la ventana emergente después de 5 segundos
            setTimeout(() => {
                hideNotification();
            }, 5000);
        }

        // Función para ocultar la ventana emergente
        function hideNotification() {
            notification.classList.remove('show');
        }

        // Ejemplo de uso
        window.addEventListener('load', () => {
            showNotification();
        });
    </script>
</body>

</html>