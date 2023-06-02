<?php

namespace controller;


use \model\AvatarM;
use \model\UsuarioM;
use \model\Utils;

session_start();

require_once("../model/AvatarM.php");
require_once("../model/UsuarioM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUsuario'])) {

    $gestorAvatar = new AvatarM();
    $gestorUsu = new UsuarioM();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar($l = false);

    $idUsuario=$_SESSION['idUsuario'];

    if (isset($_POST["guardar"]) && $_POST["guardar"] == "guardar" && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["direccion"]) && isset($_POST["codigo_postal"]) && isset($_POST["ciudad"]) && isset($_POST["provincia"]) && isset($_POST["pais"]) && isset($_POST["imagen"])) {

        $usuario["idUsuario"] = $_SESSION['idUsuario'];
        $usuario["nombre"] = $_POST["nombre"];
        $usuario["apellidos"] = $_POST["apellidos"];
        $usuario["telefono"] = $_POST["telefono"];
        $usuario["direccion"] = $_POST["direccion"];
        $usuario["codigo_postal"] = $_POST["codigo_postal"];
        $usuario["ciudad"] = $_POST["ciudad"];
        $usuario["provincia"] = $_POST["provincia"];
        $usuario["pais"] = $_POST["pais"];
        $usuario["imagen"] = $_POST["imagen"];


        $datosUsuario = $gestorUsu->actualizarUsuario($usuario, $conexPDO);

        var_dump($_POST);
        if ($datosUsuario != false) {
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["imagen"] = $usuario["imagen"];

            $mensaje = "ok";

            include("../views/usuarioV.php");
        } else {
            $datosUsuario = $gestorUsu->obtenerUsuarioPorID($idUsuario, $conexPDO);

            $avatares = $gestorAvatar->obtenerAvatares($conexPDO);

            if ($avatares != null && $datosUsuario != null) {
                include("../views/editarPerfilV.php");
            } else {
                include("../views/usuarioV.php");
            }
        }
    } else {
        $datosUsuario = $gestorUsu->obtenerUsuarioPorID($idUsuario, $conexPDO);

        $avatares = $gestorAvatar->obtenerAvatares($conexPDO);

        if ($avatares != null && $datosUsuario != false) {
            include("../views/editarPerfilV.php");
        } else {
            include("../views/usuarioV.php");
        }
    }
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}
