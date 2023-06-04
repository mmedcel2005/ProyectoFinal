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

        .form-check-input {
            margin: 0;
            font-size: 15px;
        }
    </style>
</head>

<body class="text-white">
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


    <div class="container mb-3 mt-3">
        <form action="../controller/editarPerfilC.php" method="post">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Editar Datos</h1>
                <button type="submit" class="btn btn-primary float-end" id="guardar" name="guardar" value="guardar">Guardar</button>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" <?php print('value="'. $datosCaja["nombre"] .'"');?>>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado (N/O):</label>
                <input type="text" class="form-control" id="estado" name="estado" <?php print('value="'. $datosCaja["estado"] .'"');?>>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría (Tecnologia / Ropa / Figuras / Accesorios):</label>
                <input type="text" class="form-control" id="categoria" name="categoria" <?php print('value="'. $datosCaja["categoria"] .'"');?>>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" <?php print('value="'. $datosCaja["precio"] .'"');?>>
            </div>

        </form>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function uncheckOtherCheckboxes(checkbox) {
            const checkboxes = document.getElementsByName("tarjeta");
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== checkbox) {
                    checkboxes[i].checked = false;
                }
            }
        }
    </script>
</body>

</html>