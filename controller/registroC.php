<?php

namespace controller;

session_start();

use \model\UsuarioM;
use \model\InventarioM;
use \model\CajasM;
use \model\Utils;
//Creamos un array para guardar los datos del cliente


//Añadimos el código del modelo
require_once("../model/UsuarioM.php");
require_once("../model/InventarioM.php");
require_once("../model/CajasM.php");
require_once("../model/Utils.php");


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["correo"]) && isset($_POST["password"])) {
    //rellenamos los datos del cliente que le pasaremos a la vista
    //Y lo filtramos para impedir la insercion de codigo
    $usuario["nombre"] = Utils::limpiarDatos($_POST["nombre"]);
    $usuario["apellidos"] = Utils::limpiarDatos($_POST["apellidos"]);
    $usuario["correo"] = Utils::limpiarDatos($_POST["correo"]);
    $usuario["password"] = Utils::limpiarDatos($_POST["password"]);
    $_SESSION['loggedin'] = true;


    //Generemaos la salt y le damos el valor del resultado a usuario["salt"]
    $salt = Utils::generarSalt(16, false);
    $usuario["salt"] = $salt;
    $usuario["cantTokens"] = 0;
    $usuario["imagen"] = "../src/img/avatar/ava-1.png";

    //Encriptamos el password en 256 bits
    $usuario["password"] = crypt($_POST["password"], '$5$rounds=5000$' . $usuario["salt"] . '$');

    $gestorUsu = new UsuarioM();
    $gestorInv = new InventarioM();
    $gestorCaj = new CajasM();



    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar($l = false);

    $comprobarCorreo = $gestorUsu->obtenerUsuarioPorCorreo($usuario, $conexPDO);

    if ($comprobarCorreo == false) {
        $anadirUsu = $gestorUsu->anadirUsuario($usuario, $conexPDO);
        $datosUsuario = $gestorUsu-> obtenerUsuarioPorCorreo($usuario, $conexPDO);

        $idUsuario = $datosUsuario["idUsuario"];

        $anadirInv = $gestorInv->anadirInventario($idUsuario, $conexPDO);


        if ($anadirUsu != false && $anadirInv != false) {


            $_SESSION['loggedin'] = true;

            $idInventario = $gestorInv->obtenerIdInventario($idUsuario, $conexPDO);


            if ($idInventario != null) {

                $_SESSION['idInventario'] = $idInventario;
                $_SESSION['is_admin'] = $datosUsuario['is_admin'];
                $_SESSION['imagen'] = $datosUsuario['imagen'];
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['nombre'] = $datosUsuario['nombre'];
                $_SESSION['cantTokens'] = $datosUsuario['cantTokens'];

                $datosCajas = $gestorCaj->obtenerCajas($conexPDO);

                include("../views/inicioV.php");
            }else{
                $mensaje = "Fallo al acceder a la base de datos";

                include("../views/registroV.php");
            }

        } else {
            $mensaje = "Fallo al crear usuario";


            include("../views/registroV.php");
        }
    } else {
        $mensaje = "Este correo ya existe";
        include("../views/registroV.php");
    }



    //Si ha ido bien el mensaje sera distinto de null

} else {

    //Sin datos del  cliente cargados cargamos la vista
    include("../views/registroV.php");
}
