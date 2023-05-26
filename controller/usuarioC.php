<?php

namespace controller;


use \model\UsuarioM;
use \model\ObjetoM;
use \model\CajasM;
use \model\Utils;

session_start();


require_once("../model/UsuarioM.php");
require_once("../model/ObjetoM.php");
require_once("../model/CajasM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['idUsuario'] != true ) {
    // El usuario ha iniciado sesión, permitir acceso a la página
        $cajaId= ["idCaja"];
    
        $conexPDO = Utils::conectar($l=false);
        $gestorUsuario = new UsuarioM();
        $gestorCaja = new CajasM();

        $usuario= $gestorUsuario->obtenerUsuarioPorId($idUsuario, $conexPDO);
        $items = $gestorObj->obtenerObjetosIntoCaja($cajaId, $conexPDO);   

        include("../views/usuarioV.php");
    

} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}