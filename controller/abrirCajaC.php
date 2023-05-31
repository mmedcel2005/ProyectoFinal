<?php

namespace controller;


use \model\UsuarioM;
use \model\ObjetoM;
use \model\CajasM;
use \model\InventarioM;
use \model\Utils;

session_start();


require_once("../model/UsuarioM.php");
require_once("../model/InventarioM.php");
require_once("../model/ObjetoM.php");
require_once("../model/CajasM.php");
require_once("../model/Utils.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // El usuario ha iniciado sesión, permitir acceso a la página
    $gestorCaja = new CajasM();


    if (isset($_POST["idCaja"])) {
        $cajaId = $_POST["idCaja"];


        $conexPDO = Utils::conectar($l = false);

        $gestorObj = new ObjetoM();
        $gestorUsuario = new UsuarioM();


        $caja = $gestorCaja->obtenerCajasPorID($cajaId, $conexPDO);


        if (isset($_POST["guardar"]) && $_POST["guardar"] == "guardar") {

            $precioCaja = $caja['precio'];


            if ($_SESSION['idUsuario'] != null && $_SESSION['cantTokens'] != null && $_SESSION['cantTokens'] >= $precioCaja) {
                $gestorInv = new InventarioM();

                $idUsuario = $_SESSION['idUsuario'];

                $cantTokensActual = $_SESSION['cantTokens'] - $precioCaja;

                $_SESSION['cantTokens'] = $cantTokensActual;


                if (isset($_SESSION['idInventario']) && $_SESSION['idInventario'] != null && isset($_POST['idObjeto']) && $_POST['idObjeto'] != null) {

                    $idInventario = $_SESSION['idInventario'];
                    $idObjeto = $_POST['idObjeto'];

                    $anadirItemIntoInventario = $gestorInv->anadirObjetoIntoInventario($idInventario, $idUsuario, $idObjeto, $conexPDO);

                    if ($cambiarCantTokens != false && $anadirItemIntoInventario != false) {

                        $cambiarCantTokens = $gestorUsuario->cambiarCantidadTokens($cantTokensActual, $idUsuario, $conexPDO);

                        if ($cambiarCantTokens != false) {

                            $notificacion = "ok";
                        }
                    } else {
                        $notificacion = "error";
                    }
                }
            } else {
                $notificacion = "error";
            }
        }


        $items = $gestorObj->obtenerObjetosIntoCaja($cajaId, $conexPDO);


        $items = $gestorObj->obtenerObjetosIntoCaja($cajaId, $conexPDO);

        // Definir las probabilidades de aparición para cada categoría (puedes ajustar los porcentajes según tus necesidades)
        $categoriasProbabilidades = [
            "L" => 1,
            "E" => 3,
            "SR" => 6,
            "R" => 15,
            "C" => 25,
            "MC" => 50,

        ];

        // Generar un nuevo array con las categorías en función de las probabilidades
        $itemsAleatorio = [];
        foreach ($categoriasProbabilidades as $categoria => $probabilidad) {
            $numItems = round(count($items) * ($probabilidad / 100)); // Calcular el número de elementos para esta categoría
            $categoriaItems = array_filter($items, function ($item) use ($categoria) {
                return $item['calidad'] === $categoria;
            }); // Filtrar los elementos por categoría
            $categoriaItems = array_slice($categoriaItems, 0, $numItems); // Tomar solo el número de elementos necesarios según la probabilidad
            $itemsAleatorio = array_merge($itemsAleatorio, $categoriaItems); // Agregar los elementos de esta categoría al nuevo array
        }

        shuffle($itemsAleatorio); // Mezclar aleatoriamente el nuevo array


        include("../views/abrirCajaV.php");
    } else {
        $conexPDO = Utils::conectar($l = false);

        $datosCajas = $gestorCaja->obtenerCajas($conexPDO);

        include("../views/inicioV.php");
    }
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views\loginV.php");
}
