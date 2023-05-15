<?php

namespace views;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
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
            background-color: #f5f5f5;
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
    </style>


</head>

<body class="text-center">
    <form id="login" method="POST" action="../controller/loginC.php" class="form-signin">
        <img class="mb-4" src="../src/img/logoXL.png" alt="" width="72" height="72">

        <!-- Introducir email  -->
        <div class="form-floating mb-3 mt-3">
            <input type="correo" class="form-control" id="correo" placeholder="Introduce el email" name="correo">
            <label for="correo">Email</label>
        </div>

        <!-- Introducir contraseña -->
        <div class="form-floating mt-3 mb-3">
            <input type="contrasena" class="form-control" id="contrasena" placeholder="Introduce la contraseña" name="contrasena">
            <label for="contrasena">Contraseña</label>
        </div>

        <p style="color: red;"> <?php $mensaje ?></p>

        <!-- Boton para registrarse -->
        <div class="checkbox mb-3">
            <button name="registrarse" value="registrarse" class="btn btn-link" type="submit">Registrarse</button>
        </div>

        <!-- Boton para cambiar contraseña  -->
        <div class="checkbox mb-3">
            <button name="cambiarPassword" value="cambiarPassword" class="btn btn-link" type="submit">Cambiar contraseña</button>
        </div>

        <!-- Boton para iniciar sesio  -->
        <button name="iniciar" value="iniciar" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
</body>
<!-- Scripts para usar el plugin jsquery validation -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<!-- jQuery Validation Additional Methods -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

<!-- Enlazamos el js con los parametros de la validacio  -->
<script src="../validation/loginValidation.js"></script>

</html>