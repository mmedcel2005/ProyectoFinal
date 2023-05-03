<?php
// Se define el namespace al que pertenece la clase
namespace model;

require_once("Utils.php");

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

// Se define la clase Usuario
class Usuario
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

    // Función que obtiene el usuario dado una id de usuario
    public function obtenerUsuarioPorId($idUsuario, $conexPDO)
    {
        if (isset($idUsuario) && is_numeric($idUsuario)) {
            if ($conexPDO != null) {
                try {
                    // Primero introducimos la sentencia a ejecutar con prepare
                    // Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Usuario WHERE idUsuario = ?");
                    // Asociamos a cada interrogación el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    // Ejecutamos la sentencia
                    $sentencia->execute();

                    // Devolvemos los datos del usuario
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
        if (isset($usuario) && $conexPDO != null) {
            try {
                // Se define la sentencia SQL para insertar un nuevo registro
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.Usuario (nombre, apellidos, correo, contraseña, direccion, salt, cantTokens, imagen) VALUES (:nombre, :apellidos, :correo, :contraseña, :direccion, :salt, :cantTokens, :imagen)");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellidos", $usuario["apellidos"]);
                $sentencia->bindParam(":correo", $usuario["correo"]);
                $sentencia->bindParam(":contraseña", $usuario["contraseña"]);
                $sentencia->bindParam(":direccion", $usuario["direccion"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":cantTokens", $usuario["cantTokens"]);
                $sentencia->bindParam(":imagen", $usuario["imagen"]);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $result = $sentencia->execute();

                // Si la sentencia SQL se ejecutó correctamente, se devuelve true
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
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
                $sentencia = $conexPDO->prepare("UPDATE proyecto.Usuario SET nombre = :nombre, apellidos = :apellidos, correo = :correo, contraseña = :contraseña, direccion = :direccion, salt = :salt, cantTokens = :cantTokens, imagen = :imagen WHERE idUsuario = :idUsuario");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellidos", $usuario["apellidos"]);
                $sentencia->bindParam(":correo", $usuario["correo"]);
                $sentencia->bindParam(":contraseña", $usuario["contraseña"]);
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
}
