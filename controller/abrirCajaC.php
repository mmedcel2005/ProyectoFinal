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
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // El usuario ha iniciado sesión, permitir acceso a la página
    if (isset($_GET["idCaja"])) {
        $cajaId = $_GET["idCaja"];

        $conexPDO = Utils::conectar($l = false);
        $gestorObj = new ObjetoM();
        $gestorCaja = new CajasM();

        $caja = $gestorCaja->obtenerCajasPorID($cajaId, $conexPDO);
        $objetos = $gestorObj->obtenerObjetosIntoCaja($cajaId, $conexPDO);


        // Definir las probabilidades de aparición para cada categoría (puedes ajustar los porcentajes según tus necesidades)
        $categoriasProbabilidades = [
            "L" => 50,    // 50% de probabilidad
            "E" => 30,    // 30% de probabilidad
            "SR" => 15,   // 15% de probabilidad
            "R" => 4,     // 4% de probabilidad
            "C" => 1,     // 1% de probabilidad
        ];

        // Generar un nuevo array con las categorías en función de las probabilidades
        $nuevoArray = [];
        foreach ($categoriasProbabilidades as $categoria => $probabilidad) {
            $numItems = round(count($objetos) * ($probabilidad / 100)); // Calcular el número de elementos para esta categoría
            $categoriaItems = array_filter($objetos, function ($item) use ($categoria) {
                return $item['calidad'] === $categoria;
            }); // Filtrar los elementos por categoría
            $categoriaItems = array_slice($categoriaItems, 0, $numItems); // Tomar solo el número de elementos necesarios según la probabilidad
            $nuevoArray = array_merge($nuevoArray, $categoriaItems); // Agregar los elementos de esta categoría al nuevo array
        }

        shuffle($items); // Mezclar aleatoriamente el nuevo array


        include("../views/abrirCajaV.php");
    } else {
        $conexPDO = Utils::conectar($l = false);

        $gestorCaja = new CajasM();
        $datosCajas = $gestorCaja->obtenerCajas($conexPDO);

        include("../views/inicioV.php");
    }
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views\loginV.php");
}
