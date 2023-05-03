<?php
// Se define el namespace al que pertenece la clase
namespace model;

require_once("Utils.php");

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

// Se define la clase CLientes
class Usuario
{




    // Método para obtener el numero de registros de la tabla clientes
    public function obtenerUsuario($conexPDO)
    {

        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {

                // Se define la consulta SQL
                $sentencia = $conexPDO->prepare("SELECT * FROM gimnasio.usuarios");
                // Se ejecuta la sentencia SQL y se retornan los resultados
                $sentencia->execute();


                //Devolvemos los datos en int
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    //Funcion que obtiene el usuario dado una id de usuario
    public function obtenerUsuarioPorId($idUsuario, $conexPDO)
    {
        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM gimnasio.usuarios where idUsuario=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }


    // Se define una función llamada addUsuario que añade un cliente
    function anadirUsuario($usuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if (isset($usuario) && $conexPDO != null) {

            try {
                // Se define la sentencia SQL para insertar un nuevo registro
                $sentencia = $conexPDO->prepare("INSERT INTO gimnasio.usuarios (nombre, email, fechaNacimiento, sexo, password, salt, activo, codActivacion) VALUES ( :nombre, :email, :fechaNacimiento, :sexo, :password, :salt, :activo, :codActivacion)");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":fechaNacimiento", $usuario["fechaNacimiento"]);
                $sentencia->bindParam(":sexo", $usuario["sexo"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        // Se retorna el valor de $result
        return $result;
    }

    //Funcion que comprueba la contraseña del login
    //Devuelve 0 si es incorrecta la contraseña y correo y 1 si es correcta
    public function comprobarPswd($usuario, $conexPDO)
    {
        //Comprueba que se haya enviado los datos
        if (isset($usuario["email"]) && isset($usuario["password"])) {

            $email = $usuario["email"];


            //Si la conexion es diferente de null
            if ($conexPDO != null) {
                try {
                    //Primero recogemos la salt de ese usuario

                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT salt FROM gimnasio.usuarios where email=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    $salt = $sentencia->fetchColumn();
                    if ($salt == null) {
                        return 0;
                    }

                    //Usamos la salt para encriptar la contraseña y asi poder comparar y ver si es correcta
                    $password = crypt($usuario["password"], '$5$rounds=5000$' . $salt . '$');



                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT count(*) FROM gimnasio.usuarios where email=? and password=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
                    $sentencia->bindParam(2, $password);
                    //Ejecutamos la sentencia
                    $sentencia->execute();


                    //Devolvemos los datos del Usuario
                    //Devuelve 1 si es correcto 0 si es incorrecto
                    return (int) $sentencia->fetchColumn();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }


    //Funcion que comprueba que el codigo de activacion es correcto
    //Devuelve 0 si es incorrecto y 1 si es correcto
    public function comprobarCodActv($usuario, $conexPDO)
    {
        //Se comprueba que se haya enviado los datos
        if (isset($usuario["email"]) && isset($usuario["codActivacion"])) {

            $email = $usuario["email"];
            $codActivacion = $usuario["codActivacion"];

            //Si la conexion es diferente de null
            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT count(*) FROM gimnasio.usuarios where email=? and codActivacion=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
                    $sentencia->bindParam(2, $codActivacion);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    //Devuelve 0 si es incorrecto y 1 si es correcto
                    return (int) $sentencia->fetchColumn();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    //Funcion que obtiene el numero codigo de activacion para mostrarlo
    public function obtenerCodActv($usuario, $conexPDO)
    {
        //Comprueba que se hayan enviado los daatos
        if (isset($usuario["email"])) {

            $email = $usuario["email"];

            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT codActivacion FROM gimnasio.usuarios where email=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetchColumn();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    // Funcion que devuelve el estado en el que se encuentra el usuario es decir si esta activo o no
    //Devuelve 0 si no esta activado y 1 si esta activado
    public function obtenerEstado($usuario, $conexPDO)
    {
        //Comprueba que se hayan enviado los daatos

        if (isset($usuario["email"])) {

            $email = $usuario["email"];

            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT activo FROM gimnasio.usuarios where email=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $email);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return (int) $sentencia->fetchColumn();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }


    //Funcion que cambia el estado del usuario es decir cambia el campo activo de 0 a 1
    public function activarUsuario($usuario, $conexPDO)
    {
        //Comprueba que se hayan enviado los daatos

        if (isset($usuario["email"])) {

            $email = $usuario["email"];
            $estado = 1;

            //SI la conexion es diferente de nula
            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("UPDATE gimnasio.usuarios SET activo = ? WHERE email = ?;");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $estado);
                    $sentencia->bindParam(2, $email);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
            return $result;
        }
    }

    //Funcion que cambia la contraseña
    public function changePassword($email, $newPassword, $conexPDO)
    {
        if (isset($email)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("UPDATE gimnasio.usuarios SET password = ? WHERE email = ?;");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $newPassword);
                    $sentencia->bindParam(2, $email);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
            return $result;
        }
    }
}
