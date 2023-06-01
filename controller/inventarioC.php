<?php

namespace controller;


use \model\UsuarioM;
use \model\ObjetoM;
use \model\CajasM;
use \model\InventarioM;
use \model\Utils;

session_start();


require_once("../model/UsuarioM.php");
require_once("../model/ObjetoM.php");
require_once("../model/CajasM.php");
require_once("../model/InventarioM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUsuario']) && isset($_SESSION['idInventario'])) {
    // El usuario ha iniciado sesión, permitir acceso a la página
        $idUsuario= $_SESSION['idUsuario'];
        $idInventario= $_SESSION['idInventario'];

        $conexPDO = Utils::conectar($l=false);
        $gestorUsuario = new UsuarioM();
        $gestorInv = new InventarioM();
        $gestorCaja = new CajasM();

        
        
        $objetosIntoInventario= $gestorInv->obtenerObjetoIntoInventario( $idInventario , $idUsuario, $conexPDO);


            include("../views/inventarioV.php");

} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}