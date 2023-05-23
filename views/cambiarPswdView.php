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


</head>

<body class="text-center">
    <form method="POST" id="cambiarPswd" action="../controller/cambiarPswdCntrl.php" class="form-signin">
        <img class="mb-4" src="../img/bootstrap-solid.svg" alt="" width="72" height="72">

        <!-- Introducir email  -->
        <div class="form-floating mb-3 mt-3">
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <label for="email">Email</label>
        </div>


        <!-- Introducimos la contraseña anterior  -->
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="oldPassword" placeholder="oldPassword" name="oldPassword">
            <label for="oldPassword">Contraseña anterior</label>
        </div>

        <!-- Introducimos la nueva contraseña  -->
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="newPassword" placeholder="newPassword" name="newPassword">
            <label for="newPassword">Nueva Contraseña</label>
        </div>

        <!-- Confirmamos la contraseña -->
        <div class="form-floating mt-3 mb-3">
            <input type="password" class="form-control" id="confirmPassword" placeholder="confirmPassword" name="confirmPassword">
            <label for="confirmPassword">Confirma la contraseña</label>
        </div>

        <p style="color: red;" > <?php $mensaje ?></p>

 

        <!-- Boton para enviar los datos  -->
        <button name="cambiar" value="cambiar" class="btn btn-lg btn-primary btn-block" type="submit">Cambiar contraseña</button>
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
<script src="../validation/cambiarPswdValidation.js"></script>

</html>