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

        .custom-img {
            max-width: 300px;
            height: auto;
        }

        .card-img-container {
            position: relative;
        }

        .item-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .item-card-title,
        .item-card-text {
            margin: 0;
            font-size: 15px;
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
        <h1 class="text-center text-white">Inventario</h1>
      <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
          <?php
          foreach ($objetosIntoInventario as $item) {
            print('<div class="col mb-4 rounded p-4">');
            print(' <div class="card">');
            print('   <div class="card-img-container">');
            switch ($item["calidad"]) {
              case "L":
                print('<img src="../src/img/bg-item-amarillo.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "E":
                print('<img src="../src/img/bg-item-rojo.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "SR":
                print('<img src="../src/img/bg-item-morado.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "R":
                print('<img src="../src/img/bg-item-azul.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "C":
                print('<img src="../src/img/bg-item-celeste.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              case "MC":
                print('<img src="../src/img/bg-item-gris.png" class="card-img-top" alt="Imagen de fondo">');
                break;
              default:
                break;
            }
            print('     <div class="item-overlay">');
            print('       <img src="' . $item['imagen'] . '" alt="Imagen de' . $item['nombre'] . '" class="item-image img-fluid">');
            print('      <br><h6 class="item-card-title text-white">' . $item['nombre'] . '</h6>');
            print('       <h4 class="item-card-text text-token">' . $item['precio'] . '</h4>');
            print('      </div>');
            print('    </div>');
            print('  </div>');
            print('</div>');
          }

          ?>
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
                        <p>¿Seguro que quieres vender el objeto?</p>
                    </div>

                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Cancelar</button>
                        <form action="../controller/inventarioC.php" method="post">
                            <input type="hidden" name="idObjeto" id="idObjeto" class="form-control" readonly>
                            <button type="submit" id="vender" name="vender" value="vender" class="btn btn-primary">Vender</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmacionEnviar" tabindex="-1" aria-labelledby="confirmacionEnviarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <p>¿Seguro quieres enviarlo a esta direccion?</p>
                    </div>

                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <form action="../controller/editarPerfilC.php" method="post">
                            <button type="submit" class="btn btn-secondary">Cambiar direccion</button>
                        </form>

                        <form action="../controller/inventarioC.php" method="post">
                            <input type="hidden" name="idObjetoE" id="idObjetoE" class="form-control" readonly>
                            <button type="submit" id="enviar" name="enviar" value="enviar" class="btn btn-primary">Enviar</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <?php
        if ($vendido == true) {
            print('<div id="notification" class="notification">');
            print('<span id="notification-message" class="notification-message">Has ganado ' . $tokensGanados  . ' monedas</span>');
            print('</div>');
        } elseif ($enviado == true) {
            print('<div id="notification" class="notification">');
            print('<span id="notification-message" class="notification-message">Tu envio esta siendo procesado</span>');
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
        function vender(button) {
            var idObjeto = button.value;

            document.getElementById('idObjeto').value = idObjeto;

            // Aquí puedes continuar con el código para mostrar el modal o realizar otras acciones
            $('#confirmacionVender').modal('show');
        }

        function enviar(button) {
            var idObjeto = button.value;

            document.getElementById('idObjetoE').value = idObjeto;

            // Aquí puedes continuar con el código para mostrar el modal o realizar otras acciones
            $('#confirmacionEnviar').modal('show');
        }

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