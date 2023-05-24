<?php
namespace controller;


use \model\UsuarioM;
use \model\Utils;


// En otros controladores
// session_start();
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     // El usuario ha iniciado sesión, permitir acceso a la página
//     include("views/inicioV.php");
// } else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views/loginV.php");
// }

//Creamos un array para guardar los datos del cliente

