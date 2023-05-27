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
                var_dump($idUsuario);
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
                
                // Se define la sentencia SQL para obtener los objetos del inventario
                $sentencia = $conexPDO->prepare("SELECT O.*
                    FROM Usuario U
                    JOIN Inventario I ON U.idUsuario = I.Usuario_idUsuario
                    JOIN Inventario_has_Objeto IO ON I.idInventario = IO.Inventario_idInventario
                    JOIN Objeto O ON IO.Objeto_idObjeto = O.idObjeto
                    WHERE U.idUsuario = :idUsuario AND I.idInventario = :idInventario");
                
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
    
}
