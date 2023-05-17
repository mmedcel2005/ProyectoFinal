<?php
namespace controller;


use \model\UsuarioM;
use \model\Utils;
//Creamos un array para guardar los datos del cliente



//Añadimos el código del modelo
require_once("../model/UsuarioM.php");
require_once("../model/Utils.php");

//COMPRUEBA QUE BOTON SE HA ACTIVADO
//Comprobamos si se ha pulsado el boton iniciar
if (isset($_POST["iniciar"]) && $_POST["iniciar"] == "iniciar") {
    //Comprobamos que haya enviado los daots
    if (isset($_POST["correo"]) && isset($_POST["password"])) {
        //rellenamos los datos del cliente que le pasaremos a la vista
        //Y lo filtramos para impedir la insercion de codigo
        $usuario["correo"] = Utils::limpiarDatos($_POST["correo"]);
        $usuario["password"] = Utils::limpiarDatos($_POST["password"]);


        //Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        $gestorUsu = new UsuarioM();

        //Comprobamos que la contraseña sea correcta
        $credenciales = $gestorUsu->verificarCredenciales($usuario, $conexPDO);
        //Obtenemos el codigo de activacion de la BD para mostrarlo por pantalla mas tarde puesto que no he realizado la configuracion del envio de correo en xamp

        //COMPROBAMOS CONTRASEÑA
        //Si la comprobacion de la contraseña es 0 quiere decir que es incorrecta
        if ($credenciales == 1) {
            session_start();
            $_SESSION['loggedin'] = true;

            $datosUsuario= $gestorUsu->obtenerUsuarioPorCorreo($usuario, $conexPDO);

            $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
            $_SESSION['nombre'] = $datosUsuario['nombre'];
            $_SESSION['correo'] = $datosUsuario['correo'];
            $_SESSION['cantTokens'] = $datosUsuario['cantTokens'];

            //Si no quiere decir que esta activo por lo que nos enviara a mostrar clientes
            include("../views/inicioV.php");


        } else {
                $mensaje = "El usuario o contraseña no es correcta";
                //Nos enviara a la pagina de login
                include("../views/loginV.php");

        }
    }
    //Si no se ha pulsado el boton de iniciar comprobamos si el pulsado es registrarse
} elseif (isset($_POST["registrarse"]) && $_POST["registrarse"] == "registrarse") {
    //Mostramos la pagina de registro
    include("../views/registroV.php");

    //Si no se ha pulsado ninguno de los botones anteriores comprobamos si el pulsado es cambiar contraseña
} elseif (isset($_POST["cambiarPassword"]) && $_POST["cambiarPassword"] == "cambiarPassword") {
    //Mostramos la pagina para cambiar contraseña
    include("../views/cambiarPswdView.php");
} else {
    //Si entra aqui quiere decir que no se ha pulsado ningun boton dirigimos a la pagina de login
    include("../views/loginV.php");
}
