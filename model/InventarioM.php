<?php
// Se define el namespace al que pertenece la clase
namespace model;

require_once("Utils.php");

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

class InventarioM
{
    public function anadirInventario($idUsuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null) {
            try {
                // Se define la sentencia SQL para insertar un nuevo registro
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.Inventario (Usuario_idUsuario) VALUES (:Usuario_idUsuario)");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":Usuario_idUsuario", $idUsuario);


                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $sentencia->execute();

                return $sentencia->fetch();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return $result;
    }

    public function obtenerIdInventario($usuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null && $usuario['idUsuario'] != null) {
            try {
                $idUsuario = $usuario['idUsuario'];
                // Se define la sentencia SQL para obtener el idInventario del Usuario
                $sentencia = $conexPDO->prepare("SELECT idInventario FROM proyecto.Inventario WHERE Usuario_idUsuario = :idUsuario");

                // Se asigna el valor del parámetro idUsuario al placeholder de la sentencia SQL
                $sentencia->bindParam(":idUsuario", $idUsuario);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $sentencia->execute();

                return $sentencia->fetchColumn();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return $result;
    }


    public function obtenerObjetoIntoInventario($idInventario, $idUsuario, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null && $idUsuario != null && $idInventario != null) {
            try {

                // Se define la sentencia SQL para obtener los objetos del inventario con la cantidad y ordenados por calidad
                $sentencia = $conexPDO->prepare("SELECT O.*, IO.cantidad
                FROM Usuario U
                JOIN Inventario I ON U.idUsuario = I.Usuario_idUsuario
                JOIN Inventario_has_Objeto IO ON I.idInventario = IO.Inventario_idInventario
                JOIN Objeto O ON IO.Objeto_idObjeto = O.idObjeto
                WHERE U.idUsuario = :idUsuario AND I.idInventario = :idInventario
               ");

                // Se asignan los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":idUsuario", $idUsuario);
                $sentencia->bindParam(":idInventario", $idInventario);

                // Se ejecuta la sentencia SQL y se asigna el resultado a la variable $result
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }


    // Se define una función llamada anadirUsuario que añade un usuario
    public function anadirObjetoIntoInventario($idInventario, $idUsuario, $idObjeto, $conexPDO)
    {
        // Se inicializa la variable $result en null
        $result = null;

        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null) {
            try {
                // Verificar si el objeto ya existe en el inventario
                $consulta = $conexPDO->prepare("SELECT cantidad FROM proyecto.Inventario_has_Objeto WHERE Inventario_idInventario = :Inventario_idInventario AND Inventario_Usuario_idUsuario = :Inventario_Usuario_idUsuario AND Objeto_idObjeto = :Objeto_idObjeto");
                $consulta->bindParam(":Inventario_idInventario", $idInventario);
                $consulta->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                $consulta->bindParam(":Objeto_idObjeto", $idObjeto);
                $consulta->execute();

                $cantidad = $consulta->fetchColumn();

                if ($cantidad) {
                    // Si el objeto ya existe, incrementar la cantidad en 1
                    $actualizarSentencia = $conexPDO->prepare("UPDATE proyecto.Inventario_has_Objeto SET cantidad = cantidad + 1 WHERE Inventario_idInventario = :Inventario_idInventario AND Inventario_Usuario_idUsuario = :Inventario_Usuario_idUsuario AND Objeto_idObjeto = :Objeto_idObjeto");
                    $actualizarSentencia->bindParam(":Inventario_idInventario", $idInventario);
                    $actualizarSentencia->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                    $actualizarSentencia->bindParam(":Objeto_idObjeto", $idObjeto);
                    $result = $actualizarSentencia->execute();
                } else {
                    // Si el objeto no existe, insertar un nuevo registro con cantidad 1
                    $insertarSentencia = $conexPDO->prepare("INSERT INTO proyecto.Inventario_has_Objeto (Inventario_idInventario, Inventario_Usuario_idUsuario, Objeto_idObjeto, cantidad) VALUES (:Inventario_idInventario, :Inventario_Usuario_idUsuario, :Objeto_idObjeto, 1)");
                    $insertarSentencia->bindParam(":Inventario_idInventario", $idInventario);
                    $insertarSentencia->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                    $insertarSentencia->bindParam(":Objeto_idObjeto", $idObjeto);
                    $result = $insertarSentencia->execute();
                }
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return $result;
    }

    public function reducirObjetoInventario($idInventario, $idUsuario, $idObjeto, $conexPDO)
    {
        $result = null;

        if ($conexPDO != null) {
            try {
                $consulta = $conexPDO->prepare("SELECT cantidad FROM proyecto.Inventario_has_Objeto WHERE Inventario_idInventario = :Inventario_idInventario AND Inventario_Usuario_idUsuario = :Inventario_Usuario_idUsuario AND Objeto_idObjeto = :Objeto_idObjeto");
                $consulta->bindParam(":Inventario_idInventario", $idInventario);
                $consulta->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                $consulta->bindParam(":Objeto_idObjeto", $idObjeto);
                $consulta->execute();

                $cantidad = $consulta->fetchColumn();

                if ($cantidad) {
                    // Si la cantidad es 1, eliminar el objeto
                    if ($cantidad == 1) {
                        $eliminarSentencia = $conexPDO->prepare("DELETE FROM proyecto.Inventario_has_Objeto WHERE Inventario_idInventario = :Inventario_idInventario AND Inventario_Usuario_idUsuario = :Inventario_Usuario_idUsuario AND Objeto_idObjeto = :Objeto_idObjeto");
                        $eliminarSentencia->bindParam(":Inventario_idInventario", $idInventario);
                        $eliminarSentencia->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                        $eliminarSentencia->bindParam(":Objeto_idObjeto", $idObjeto);
                        $result = $eliminarSentencia->execute();
                    } elseif($cantidad > 1) {
                        // Si la cantidad es mayor a 1, restar uno a la cantidad
                        $actualizarSentencia = $conexPDO->prepare("UPDATE proyecto.Inventario_has_Objeto SET cantidad = cantidad - 1 WHERE Inventario_idInventario = :Inventario_idInventario AND Inventario_Usuario_idUsuario = :Inventario_Usuario_idUsuario AND Objeto_idObjeto = :Objeto_idObjeto");
                        $actualizarSentencia->bindParam(":Inventario_idInventario", $idInventario);
                        $actualizarSentencia->bindParam(":Inventario_Usuario_idUsuario", $idUsuario);
                        $actualizarSentencia->bindParam(":Objeto_idObjeto", $idObjeto);
                        $result = $actualizarSentencia->execute();
                    }
                }
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return $result;
    }
}
