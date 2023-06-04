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

   if(isset($_POST['guardar']) &&  $_POST['guardar']== "guardar" && isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['estado'])  && isset($_POST['categoria'])  && isset($_POST['idCaja'])){

      $caja["nombre"] = $_POST['nombre'];
      $caja["precio"] = $_POST['precio'];
      $caja["estado"] = $_POST['estado'];
      $caja["categoria"] = $_POST['categoria'];
      $caja["idCaja"] = $_POST['idCaja'];

      $actualizarCaja = $gestorCaj->actualizarCaja($caja, $conexPDO);

      var_dump($actualizarCaja);

      if($actualizarCaja != false){

         $cajaEditada= true;

         include("../views/inicioV.php");

      }

   }elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true && isset($_POST['editarCajaID'])) {
      $cajaId = $_POST['editarCajaID'];
      $datosCaja = $gestorCaj->obtenerCajasPorID($cajaId, $conexPDO);

      include("../views/editarCajaV.php");
   } else {
      $datosCajas = $gestorCaj->obtenerCajas($conexPDO);
      include("../views/inicioV.php");
   }
} else {
   include("../views/loginV.php");
}
