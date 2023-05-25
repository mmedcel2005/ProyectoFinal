<?php

namespace controller;


use \model\UsuarioM;
use \model\CajasM;
use \model\Utils;


require_once("model/UsuarioM.php");
require_once("model/Utils.php");
require_once("model/CajasM.php");


// En otros controladores
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // El usuario ha iniciado sesión, permitir acceso a la página

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();


    $gestorCaj = new CajasM();

    $datosCajas = $gestorCaj->obtenerCajas($conexPDO);

    include("views/inicioV.php");
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views/loginV.php");
}

//Creamos un array para guardar los datos del cliente
