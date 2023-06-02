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
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUsuario'])) {

    $gestorAvatar = new AvatarM();
    $gestorUsuario = new UsuarioM();
    $gestorInv = new InventarioM();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar($l = false);

    $idUsuario = $_SESSION['idUsuario'];

    if (isset($_POST["guardar"]) && $_POST["guardar"] == "guardar" && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["direccion"]) && isset($_POST["codigo_postal"]) && isset($_POST["ciudad"]) && isset($_POST["provincia"]) && isset($_POST["pais"]) && isset($_POST["imagen"])) {

        $usuario["idUsuario"] = $idUsuario;
        $usuario["nombre"] = $_POST["nombre"];
        $usuario["apellidos"] = $_POST["apellidos"];
        $usuario["telefono"] = $_POST["telefono"];
        $usuario["direccion"] = $_POST["direccion"];
        $usuario["codigo_postal"] = $_POST["codigo_postal"];
        $usuario["ciudad"] = $_POST["ciudad"];
        $usuario["provincia"] = $_POST["provincia"];
        $usuario["pais"] = $_POST["pais"];
        $usuario["imagen"] = $_POST["imagen"];


        $datosUsuario = $gestorUsuario->actualizarUsuario($usuario, $conexPDO);

        if ($datosUsuario != false) {
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["imagen"] = $usuario["imagen"];
            $idInventario = $_SESSION["idInventario"];

            $usuario = $gestorUsuario->obtenerUsuarioPorId($idUsuario, $conexPDO);

            $objetosIntoInventario = $gestorInv->obtenerObjetoIntoInventario($idInventario, $idUsuario, $conexPDO);


            if ($usuario != null) {
                $mensaje = "ok";

                include("../views/usuarioV.php");
            } else {

                $gestorCaj = new CajasM();

                $datosCajas = $gestorCaj->obtenerCajas($conexPDO);

                include("../views/inicioV.php");
            }
        } else {
            $datosUsuario = $gestorUsu->obtenerUsuarioPorID($idUsuario, $conexPDO);

            $avatares = $gestorAvatar->obtenerAvatares($conexPDO);

            if ($avatares != null && $datosUsuario != null) {
                include("../views/editarPerfilV.php");
            } else {
                $usuario = $gestorUsuario->obtenerUsuarioPorId($idUsuario, $conexPDO);

                $objetosIntoInventario = $gestorInv->obtenerObjetoIntoInventario($idInventario, $idUsuario, $conexPDO);


                if ($usuario != null) {
                    $mensaje = "ok";

                    include("../views/usuarioV.php");
                } else {

                    $gestorCaj = new CajasM();

                    $datosCajas = $gestorCaj->obtenerCajas($conexPDO);

                    include("../views/inicioV.php");
                }
            }
        }
    } else {
        $datosUsuario = $gestorUsuario->obtenerUsuarioPorID($idUsuario, $conexPDO);

        $avatares = $gestorAvatar->obtenerAvatares($conexPDO);

        if ($avatares != null && $datosUsuario != false) {
            include("../views/editarPerfilV.php");
        } else {
            $usuario = $gestorUsuario->obtenerUsuarioPorId($idUsuario, $conexPDO);

            $objetosIntoInventario = $gestorInv->obtenerObjetoIntoInventario($idInventario, $idUsuario, $conexPDO);


            if ($usuario != null) {

                $mensaje = "ok";

                include("../views/usuarioV.php");
            } else {

                $gestorCaj = new CajasM();

                $datosCajas = $gestorCaj->obtenerCajas($conexPDO);

                include("../views/inicioV.php");
            }
        }
    }
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}
