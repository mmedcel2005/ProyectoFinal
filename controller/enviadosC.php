<?php

namespace controller;


use \model\UsuarioM;
use \model\ObjetoM;
use \model\CajasM;
use \model\EnviadosM;
use \model\InventarioM;
use \model\Utils;

session_start();


require_once("../model/UsuarioM.php");
require_once("../model/ObjetoM.php");
require_once("../model/EnviadosM.php");
require_once("../model/CajasM.php");
require_once("../model/InventarioM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUsuario']) && isset($_SESSION['idInventario'])) {
    // El usuario ha iniciado sesión, permitir acceso a la página
    $idUsuario = $_SESSION['idUsuario'];

    $conexPDO = Utils::conectar($l = false);

    $gestorObj = new ObjetoM();
    $gestorEnv = new EnviadosM();

    $enviados = $gestorEnv->obtenerEnviosUsuario($idUsuario, $conexPDO);

    if($enviados != null){

        include("../views/enviadosM.php");

    }else{
        include("../views/usuarioV.php");

    }


}else{
    include("../views/loginV.php");
}