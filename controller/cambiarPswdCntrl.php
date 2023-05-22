<?php

namespace controller;


use \model\Usuario;
use \model\Utils;
//Creamos un array para guardar los datos del cliente

session_start();


//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["email"]) && isset($_POST["oldPassword"]) && isset($_POST["newPassword"])) {

    $usuario["email"] = Utils::limpiarDatos($_POST["email"]);
    $newPassword = Utils::limpiarDatos($_POST["newPassword"]);
    $oldPassword = Utils::limpiarDatos($_POST["oldPassword"]);

    $usuario["password"]=$oldPassword;


    $email = $usuario["email"];

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $gestorUsu = new Usuario();

    $comprobarPswdLogin=$gestorUsu->comprobarPswdLogin($usuario, $conexPDO);
    //Comprobamos que la contraseña sea correcta usando la funcion si es 0 no es correcta
    if ($comprobarPswdLogin == 0) {

        $mensaje = "El usuario o contraseña no es correcta";
        include("../views/cambiarPswdView.php");
    } else {
        //Si es correcta se cambia la contraseña
        $cambiarPswd = $gestorUsu->changePassword($email, $newPassword, $conexPDO);
        //Si cambiar es diferente de null significa que se ejecuto correctamente
        if ($cambiarPswd != null) {
            $usuario["password"] = $newPassword;
            //Comprobamos cual es el estado es decir si esta activada la cuenta o no
            $getEstado = $gestorUsu->getEstado($usuario, $conexPDO);
            //Si es 0 no esta activada por lo que se envia a la pagina de activacion para que active la cuenta
            if ($getEstado == 0) {
                include("../views/activarUsuario.php");
            } else {
                //Si no entoces quiere decir que esta activada por lo tanto mostramos la pagina de mostrarClientes
                include("../views/mostrarClientes.php");
            }
        } else {
            //Si cambiar contraseña no se ejecuta correctamente nos dirigira a la pagina de cambiar contraseña de nuevo
            $mensaje = "Ha habido un fallo al cambiar la contraseña";
            include("../views/cambiarPswdView.php");
        }
    }
} else {
    //Si no se ha recibido los datos mostramos la pagina de cambiar contraseña
    include("../views/cambiarPswdView.php");
}
