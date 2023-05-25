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
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // El usuario ha iniciado sesión, permitir acceso a la página
    if (isset($_POST["idCaja"])) {
        $cajaId= $_POST["idCaja"];
    
        $conexPDO = Utils::conectar($l=false);
        $gestorObj = new ObjetoM();
        $gestorCaja = new CajasM();

        $caja= $gestorCaja->obtenerCajasPorID($cajaId, $conexPDO);
        $items = $gestorObj->obtenerObjetosIntoCaja($cajaId, $conexPDO);   

        include("../views/abrirCajaV.php");
    }else{
        $conexPDO = Utils::conectar($l=false);

        $gestorCaja = new CajasM();
        $datosCajas = $gestorCaja->obtenerCajas($conexPDO);

        include("../views/inicioV.php");
    }

} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views\loginV.php");
}


