<?php

namespace controller;


use \model\AvatarM;
use \model\UsuarioM;
use \model\CajasM;
use \model\InventarioM;
use \model\Utils;

session_start();

require_once("../model/AvatarM.php");
require_once("../model/CajasM.php");
require_once("../model/UsuarioM.php");
require_once("../model/InventarioM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

   $conexPDO = Utils::conectar($l = false);
   $gestorCaj = new CajasM();

   if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true && isset($_POST['editarCajaID'])) {
      $cajaId = $_POST['cajaId'];
      $datosCaja = $gestorCaj->obtenerCajasPorID($cajaId, $conexPDO);

      var_dump($datosCaja);
      include("../views/editarCajaV.php");
   } else {
      $datosCajas = $gestorCaj->obtenerCajas($conexPDO);
      include("../views/inicioV.php");
   }
} else {
   include("../views/loginV.php");
}
