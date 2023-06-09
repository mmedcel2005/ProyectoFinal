<?php

namespace views;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="../src/img/logo-Mini.png" type="image/x-icon">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Document</title>

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #1c1c1c;
        }

        .bg-custom {
            background-color: #121212;
        }

        .bg-custom-sec {
            background-color: #2b2b2b;
        }

        .text-token {
            color: #efb810;
        }

        .btn-amarillo {
            background-color: #efb810;
            font-weight: bold;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .btn-bg-custom {
            background-color: #121212;
        }

        .btn-bg-custom:hover {
            background-color: #121212;

        }

        .btn-amarillo:hover {
            background-color: #efb810;
            color: white;
        }

        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
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

<body class="text-center">
    <form id="login" method="POST" action="../controller/loginC.php" class="form-signin">
        <img class="mb-4" src="../src/img/logoXL.png" alt="" width="300" height="72">

        <!-- Introducir email  -->
        <div class="form-floating mb-3 mt-3">
            <input type="correo" class="form-control" id="correo" placeholder="Introduce el email" name="correo">
            <label for="correo">Email</label>
        </div>

        <!-- Introducir contraseña -->
        <div class="form-floating mt-3 mb-3">
            <input type="password" class="form-control" id="password" placeholder="Introduce la contraseña" name="password">
            <label for="password">Contraseña</label>
        </div>

        <p style="color: red;"> <?php $mensaje ?></p>

        <!-- Boton para registrarse -->
        <div class="checkbox mb-3">
            <button name="registrarse" value="registrarse" class="btn btn-link text-token" type="submit">Registrarse</button>
        </div>

        <!-- Boton para cambiar contraseña  -->


        <!-- Boton para iniciar sesio  -->
        <button name="iniciar" value="iniciar" class="btn btn-lg btn-amarillo btn-block" type="submit">Iniciar Sesión</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
    <?php
    if ($mensaje != null) {
        print('<div id="notification" class="notification">');
        print('<span id="notification-message" class="notification-message">'. $mensaje .'</span>');
        print('</div>');
    }
    ?>


    <!-- Scripts para usar el plugin jsquery validation -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- jQuery Validation Additional Methods -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    <!-- Enlazamos el js con los parametros de la validacio  -->
    <script src="../validation/loginValidation.js"></script>
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