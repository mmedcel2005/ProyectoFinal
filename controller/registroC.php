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
    $usuario["imagen"] = "../src/img/ava-1.png";

    //Encriptamos el password en 256 bits
    $usuario["password"] = crypt($_POST["password"], '$5$rounds=5000$' . $usuario["salt"] . '$');

    $gestorUsu = new UsuarioM();
    $gestorInv = new InventarioM();
    $gestorCaj = new CajasM();



    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar($l = false);

    $comprobarCorreo = $gestorUsu->obtenerUsuarioPorCorreo($usuario, $conexPDO);

    if ($comprobarCorreo != null) {
        $resultado = $gestorUsu->anadirUsuario($usuario, $conexPDO);

        if ($resultado != null) {


            $_SESSION['loggedin'] = true;
            var_dump($_SESSION['loggedin']);

            $idInventario = $gestorInv->obtenerIdInventario($datosUsuario, $conexPDO);

            if ($idInventario != null) {
                $_SESSION['idInventario'] = $idInventario;
                $_SESSION['imagen'] = $usuario['imagen'];
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['cantTokens'] = $usuario['cantTokens'];

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
