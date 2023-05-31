<?php
// Se define el namespace al que pertenece la clase
namespace Model;

require_once('Utils.php');

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

// Se define la clase Usuario
class UsuarioM
{
    // Método para obtener los registros de la tabla usuarios
    public function obtenerUsuarios($conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Usuario");
                // Se ejecuta la sentencia SQL y se retornan los resultados
                $sentencia->execute();

                // Devolvemos los datos en int
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    public function obtenerUsuarioPorCorreo($usuario, $conexPDO)
    {
        if (isset($usuario["correo"])) {
            $correo = $usuario["correo"];
            if ($conexPDO != null) {
                try {
                    $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Usuario WHERE correo = ?");
                    $sentencia->bindParam(1, $correo);
                    $sentencia->execute();

                    // Devolvemos el nombre de usuario
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    public function obtenerUsuarioPorID($idUsuario, $conexPDO)
    {
        if ($idUsuario != null) {

            if ($conexPDO != null) {
                try {
                    $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Usuario WHERE idUsuario = ?");
                    $sentencia->bindParam(1, $idUsuario);
                    $sentencia->execute();

                    // Devolvemos el nombre de usuario
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }



    // Se define una función llamada anadirUsuario que añade un usuario
    public function anadirUsuario($usuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null) {
            try {
                // Se define la sentencia SQL para insertar un nuevo registro
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.Usuario (nombre, apellidos, correo, password, salt, cantTokens, imagen) VALUES (:nombre, :apellidos, :correo, :password, :salt, :cantTokens, :imagen)");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellidos", $usuario["apellidos"]);
                $sentencia->bindParam(":correo", $usuario["correo"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":cantTokens", $usuario["cantTokens"]);
                $sentencia->bindParam(":imagen", $usuario["imagen"]);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return $result;
    }




    // Función que actualiza la información de un usuario dado su id
    public function actualizarUsuario($usuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if (isset($usuario) && $conexPDO != null) {
            try {
                // Se define la sentencia SQL para actualizar el registro
                $sentencia = $conexPDO->prepare("UPDATE proyecto.Usuario SET nombre = :nombre, apellidos = :apellidos, correo = :correo, password = :password, direccion = :direccion, salt = :salt, cantTokens = :cantTokens, imagen = :imagen WHERE idUsuario = :idUsuario");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellidos", $usuario["apellidos"]);
                $sentencia->bindParam(":correo", $usuario["correo"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":direccion", $usuario["direccion"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":cantTokens", $usuario["cantTokens"]);
                $sentencia->bindParam(":imagen", $usuario["imagen"]);
                $sentencia->bindParam(":idUsuario", $usuario["idUsuario"]);

                // Se ejecuta la sentencia SQL
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                // Se muestra el mensaje de error
                echo "Error al actualizar el usuario: " . $e->getMessage();
            }
        }
        // Se retorna el resultado de la operación
        return $result;
    }


    // Función que elimina un usuario dado su id
    public function eliminarUsuario($idUsuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if (isset($idUsuario) && is_numeric($idUsuario) && $conexPDO != null) {
            try {
                // Se define la sentencia SQL para eliminar el registro
                $sentencia = $conexPDO->prepare("DELETE FROM proyecto.Usuario WHERE idUsuario = ?");

                // Se asigna el valor del parámetro a la interrogación de la sentencia SQL
                $sentencia->bindParam(1, $idUsuario);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        // Se devuelve el valor de la variable $result
        return $result;
    }



    public function verificarCredenciales($usuario, $conexPDO)
    {
        if (isset($usuario["correo"]) && isset($usuario["password"])) {
            $correo = $usuario["correo"];
            $password = $usuario["password"];

            $sentencia = null;

            if ($conexPDO != null) {
                try {
                    $sentencia = $conexPDO->prepare("SELECT salt FROM proyecto.Usuario WHERE correo = ?");
                    $sentencia->bindParam(1, $correo);
                    $sentencia->execute();

                    $salt = $sentencia->fetchColumn();


                    if ($salt != null) {
                        $password = crypt($usuario["password"], '$5$rounds=5000$' . $salt . '$');
                        $sentencia = $conexPDO->prepare("SELECT COUNT(*) FROM proyecto.Usuario WHERE correo = ? AND password = ?;");
                        $sentencia->bindParam(1, $correo);
                        $sentencia->bindParam(2, $password);
                        //Ejecutamos la sentencia
                        $sentencia->execute();

                        return (int) $sentencia->fetchColumn();
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
            return $sentencia;
        }
    }

    public function cambiarCantidadTokens($cantTokens, $idUsuario, $conexPDO)
    {
        if ($conexPDO != null) {
            try {
                $sentencia = $conexPDO->prepare("UPDATE Usuario SET cantTokens = :cantTokens WHERE idUsuario = :idUsuario");
                $sentencia->bindParam(":cantTokens", $cantTokens);
                $sentencia->bindParam(":idUsuario", $idUsuario);
                $sentencia->execute();

                // Devolvemos el nombre de usuario
                return $sentencia->fetch();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }
}
