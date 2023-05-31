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
        $gestorUsuario = new UsuarioM();

        $caja = $gestorCaja->obtenerCajasPorID($cajaId, $conexPDO);
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

        $gestorCaja = new CajasM();
        $datosCajas = $gestorCaja->obtenerCajas($conexPDO);

        include("../views/inicioV.php");
    }
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    include("views\loginV.php");
}
