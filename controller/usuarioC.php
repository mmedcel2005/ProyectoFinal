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
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUsuario']) ) {
    // El usuario ha iniciado sesión, permitir acceso a la página
        $idUsuario= $_SESSION['idUsuario'];
    
        $conexPDO = Utils::conectar($l=false);
        $gestorUsuario = new UsuarioM();
        $gestorCaja = new CajasM();

        var_dump($idUsuario);
        
        $usuario= $gestorUsuario->obtenerUsuarioPorId($idUsuario, $conexPDO);

        if($usuario != null){
            include("../views/usuarioV.php");
        }

        var_dump($usuario);

        include("../views/inicioV.php");
    

} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}