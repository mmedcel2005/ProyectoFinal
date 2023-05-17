<?php

namespace controller;



use \model\UsuarioM;
use \model\Utils;
//Creamos un array para guardar los datos del cliente


//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["correo"]) && isset($_POST["password"])) {
    //rellenamos los datos del cliente que le pasaremos a la vista
    //Y lo filtramos para impedir la insercion de codigo
    $usuario["nombre"] = Utils::limpiarDatos($_POST["nombre"]);
    $usuario["apellidos"] = Utils::limpiarDatos($_POST["apellidos"]);
    $usuario["correo"] = Utils::limpiarDatos($_POST["correo"]);
    $usuario["password"] = Utils::limpiarDatos($_POST["password"]);


    //Generemaos la salt y le damos el valor del resultado a usuario["salt"]
    $salt = Utils::generarSalt(16, false);
    $usuario["salt"] = $salt;
    $usuario["cantTokens"] = 0;
    $usuario["imagen"] = "https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp";

    //Encriptamos el password en 256 bits
    $usuario["password"] = crypt($_POST["password"], '$5$rounds=5000$' . $usuario["salt"] . '$');

    $gestorUsu = new UsuarioM();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Añadimos el registro
    $resultado = $gestorUsu->anadirUsuario($usuario, $conexPDO);

    //Si ha ido bien el mensaje sera distinto de null
    if ($resultado != null) {
        session_start();
        $_SESSION['loggedin'] = true;

        $datosUsuario= $gestorUsu->obtenerUsuarioPorCorreo($usuario, $conexPDO);

        $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
        $_SESSION['nombre'] = $datosUsuario['nombre'];
        $_SESSION['correo'] = $datosUsuario['correo'];
        $_SESSION['cantTokens'] = $datosUsuario['cantTokens'];

        include("../views/inicioV.php");
    } else {
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos";

        //var_dump($datosClientes);
        include("../views/registroV.php");
    }
} else {

    //Sin datos del  cliente cargados cargamos la vista
    include("../views/registroUsuario.php");
}
