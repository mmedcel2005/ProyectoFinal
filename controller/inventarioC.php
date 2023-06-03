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
    $idInventario = $_SESSION['idInventario'];

    $conexPDO = Utils::conectar($l = false);

    $gestorObj = new ObjetoM();
    $gestorEnv = new EnviadosM();
    $gestorUsuario = new UsuarioM();
    $gestorInv = new InventarioM();
    $gestorCaja = new CajasM();

    var_dump($_POST["enviar"]);

    if (isset($_POST["vender"]) && $_POST["vender"] == "vender") {
        $precioCaja = $caja['precio'];

        if ($_SESSION['idUsuario'] != null && $_SESSION['cantTokens'] != null) {
            $gestorInv = new InventarioM();

            $idUsuario = $_SESSION['idUsuario'];

            if (isset($_SESSION['idInventario']) && $_SESSION['idInventario'] != null && isset($_POST['idObjeto']) && $_POST['idObjeto'] != null) {

                $idInventario = $_SESSION['idInventario'];
                $idObjeto = $_POST['idObjeto'];


                $cantTokensActual = $_SESSION['cantTokens'] - $precioCaja;

                $objeto = $gestorObj->obtenerObjetoPorID($idObjeto, $conexPDO);

                $reducirObjeto = $gestorInv->reducirObjetoInventario($idInventario, $idUsuario, $idObjeto, $conexPDO);

                if ($reducirObjeto != false) {
                    $tokensGanados = $objeto['precio'] * 100;

                    $cantTokensActual = $cantTokensActual + $tokensGanados;

                    $cambiarCantTokens = $gestorUsuario->cambiarCantidadTokens($cantTokensActual, $idUsuario, $conexPDO);

                    if ($cambiarCantTokens != false) {

                        $_SESSION['cantTokens'] = $cantTokensActual;

                        $vendido = true;
                    }
                }
            }
        }
    }elseif (isset($_POST["enviar"]) && $_POST["enviar"] == "enviar") {

        if ($_SESSION['idUsuario'] != null) {
            $gestorInv = new InventarioM();

            $idUsuario = $_SESSION['idUsuario'];

            if (isset($_SESSION['idInventario']) && $_SESSION['idInventario'] != null && isset($_POST['idObjeto']) && $_POST['idObjeto'] != null) {

                $idInventario = $_SESSION['idInventario'];
                $idObjeto = $_POST['idObjeto'];

                $reducirObjeto = $gestorInv->reducirObjetoInventario($idInventario, $idUsuario, $idObjeto, $conexPDO);
                
                $anadirEnviados = $gestorEnv->agregarObjetoEnviado($idObjeto, $idUsuario, $conexPDO);

               

                if ($reducirObjeto != false && $anadirEnviados != false) {
                    $tokensGanados = $objeto['precio'] * 100;

                    $cantTokensActual = $cantTokensActual + $tokensGanados;

                    $cambiarCantTokens = $gestorUsuario->cambiarCantidadTokens($cantTokensActual, $idUsuario, $conexPDO);

                    if ($cambiarCantTokens != false) {

                        $_SESSION['cantTokens'] = $cantTokensActual;

                        $vendido = true;
                    }
                }
            }
        }
    }

    $objetosIntoInventario = $gestorInv->obtenerObjetoIntoInventario($idInventario, $idUsuario, $conexPDO);

    include("../views/inventarioV.php");
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("../views/loginV.php");
}
