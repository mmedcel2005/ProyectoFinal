<?php
namespace controller;


use \model\UsuarioM;
use \model\CajasM;
use \model\InventarioM;
use \model\Utils;
//Creamos un array para guardar los datos del cliente


session_start();

//Añadimos el código del modelo
require_once("../model/UsuarioM.php");
require_once("../model/Utils.php");
require_once("../model/InventarioM.php");
require_once("../model/CajasM.php");

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
        $conexPDO = Utils::conectar($l=false);


        $gestorUsu = new UsuarioM();
        $gestorCaj = new CajasM();
        $gestorInv = new InventarioM();



        //Comprobamos que la contraseña sea correcta
        $credenciales = $gestorUsu->verificarCredenciales($usuario, $conexPDO);

        //Obtenemos el codigo de activacion de la BD para mostrarlo por pantalla mas tarde puesto que no he realizado la configuracion del envio de correo en xamp

        //COMPROBAMOS CONTRASEÑA
        //Si la comprobacion de la contraseña es 0 quiere decir que es incorrecta
        if ($credenciales != null) {
            $_SESSION['loggedin'] = true;

            $datosUsuario= $gestorUsu->obtenerUsuarioPorCorreo($usuario, $conexPDO);
            $datosCajas= $gestorCaj->obtenerCajas($conexPDO);
            $idInventario = $gestorInv->obtenerIdInventario($datosUsuario['idUsuario'], $conexPDO);


            $_SESSION['is_admin'] = $datosUsuario['is_admin'];
            var_dump($datosUsuario);
            $_SESSION['idInventario'] = $idInventario;
            $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
            $_SESSION['imagen'] = $datosUsuario['imagen'];
            $_SESSION['nombre'] = $datosUsuario['nombre'];
            $_SESSION['cantTokens'] = $datosUsuario['cantTokens'];


            $mensaje="Iniciado sesion correctamente";

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

} elseif(isset($_POST["cerrarSesion"]) && $_POST["cerrarSesion"] == "cerrarSesion"){
// Limpiar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

include("../views/loginV.php");


}else {
    //Si entra aqui quiere decir que no se ha pulsado ningun boton dirigimos a la pagina de login
    include("../views/loginV.php");
}
