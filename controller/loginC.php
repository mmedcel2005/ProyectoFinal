<?php
namespace controller;


use \model\Usuario;
use \model\Utils;
//Creamos un array para guardar los datos del cliente



//Añadimos el código del modelo
require_once("../model/UsuarioM.php");
require_once("../model/Utils.php");

//COMPRUEBA QUE BOTON SE HA ACTIVADO
//Comprobamos si se ha pulsado el boton iniciar
if (isset($_POST["iniciar"]) && $_POST["iniciar"] == "iniciar") {
    //Comprobamos que haya enviado los daots
    if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
        //rellenamos los datos del cliente que le pasaremos a la vista
        //Y lo filtramos para impedir la insercion de codigo
        $usuario["correo"] = Utils::limpiarDatos($_POST["correo"]);
        $usuario["contrasena"] = Utils::limpiarDatos($_POST["contrasena"]);


        //Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        $gestorUsu = new Usuario();

        //Comprobamos que la contraseña sea correcta
        $comprobarPswd = $gestorUsu->comprobarPswdLogin($usuario, $conexPDO);
        //Obtenemos el codigo de activacion de la BD para mostrarlo por pantalla mas tarde puesto que no he realizado la configuracion del envio de correo en xamp

        //COMPROBAMOS CONTRASEÑA
        //Si la comprobacion de la contraseña es 0 quiere decir que es incorrecta
        if ($comprobarPswd == 0) {

            $mensaje = "El usuario o contraseña no es correcta";
            //Nos enviara a la pagina de login
            include("../views/loginV.php");
        } else {
         
                //Si no quiere decir que esta activo por lo que nos enviara a mostrar clientes
                include("../views/inicioV.php");

        }
    }
    //Si no se ha pulsado el boton de iniciar comprobamos si el pulsado es registrarse
} elseif (isset($_POST["registrarse"]) && $_POST["registrarse"] == "registrarse") {
    //Mostramos la pagina de registro
    include("../views/registroUsuario.php");

    //Si no se ha pulsado ninguno de los botones anteriores comprobamos si el pulsado es cambiar contraseña
} elseif (isset($_POST["cambiarPassword"]) && $_POST["cambiarPassword"] == "cambiarPassword") {
    //Mostramos la pagina para cambiar contraseña
    include("../views/cambiarPswdView.php");
} else {
    //Si entra aqui quiere decir que no se ha pulsado ningun boton dirigimos a la pagina de login
    include("../views/login.php");
}
