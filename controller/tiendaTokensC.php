<?php
namespace controller;


use \model\UsuarioM;
use \model\Utils;
use \model\CajasM; 
use \model\PacktokenM; 
//Creamos un array para guardar los datos del cliente


session_start();

//Añadimos el código del modelo
require_once("../model/UsuarioM.php");
require_once("../model/CajasM.php");
require_once("../model/PackTokenM.php");
require_once("../model/Utils.php");


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $gestorToken = new PacktokenM();

    $packTokens = $gestorToken->obtenerPackTokens($conexPDO);

    if($packTokens != null){

        include("../views/tiendaTokensV.php");

    }else{
        $gestorCaj = new CajasM();

        $datosCajas= $gestorCaj->obtenerCajas($conexPDO);

        include("../views/inicioV.php");
    }

} else {
    //Si entra aqui quiere decir que no se ha pulsado ningun boton dirigimos a la pagina de login
    include("../views/loginV.php");
}