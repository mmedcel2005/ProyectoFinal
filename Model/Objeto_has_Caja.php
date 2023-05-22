<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Objeto_has_Caja
{
    // Función para asignar un objeto a una caja
    public function asignarObjetoACaja($conexPDO, $idObjeto, $idCaja)
    {
        if ($conexPDO != null && isset($idObjeto) && isset($idCaja)) {
            try {
                // Se define la sentencia SQL para asignar el objeto a la caja
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.Objeto_has_Caja (Objeto_idObjeto, Caja_idCaja) VALUES (:idObjeto, :idCaja)");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $idObjeto);
                $sentencia->bindParam(":idCaja", $idCaja);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para quitar un objeto de una caja
    public function quitarObjetoDeCaja($conexPDO, $idObjeto, $idCaja)
    {
        if ($conexPDO != null && isset($idObjeto) && isset($idCaja)) {
            try {
                // Se define la sentencia SQL para quitar el objeto de la caja
                $sentencia = $conexPDO->prepare("DELETE FROM proyecto.Objeto_has_Caja WHERE Objeto_idObjeto = :idObjeto AND Caja_idCaja = :idCaja");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $idObjeto);
                $sentencia->bindParam(":idCaja", $idCaja);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error

                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

   

    // Función para obtener un objeto por su ID
    public function obtenerObjetoPorID($conexPDO, $idObjeto)
    {
        if ($conexPDO != null && isset($idObjeto)) {
            try {
                // Se define la sentencia SQL para obtener el objeto por su ID
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Objeto WHERE idObjeto = :idObjeto");

                // Se asigna el valor del ID del objeto al placeholder de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $idObjeto);

                // Se ejecuta la sentencia SQL y se devuelve el resultado
                $sentencia->execute();
                return $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para agregar un nuevo objeto a la base de datos
    public function agregarObjeto($conexPDO, $nombre, $descripcion)
    {
        if ($conexPDO != null && isset($nombre) && isset($descripcion)) {
            try {
                // Se define la sentencia SQL para agregar el objeto
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.Objeto (nombre, descripcion) VALUES (:nombre, :descripcion)");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $nombre);
                $sentencia->bindParam(":descripcion", $descripcion);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para actualizar un objeto en la base de datos
    public function actualizarObjeto($conexPDO, $idObjeto, $nombre, $descripcion)
    {
        if ($conexPDO != null && isset($idObjeto) && isset($nombre) && isset($descripcion)) {
            try {
                // Se define la sentencia SQL para actualizar el objeto
                $sentencia = $conexPDO->prepare("UPDATE proyecto.Objeto SET nombre = :nombre, descripcion = :descripcion WHERE idObjeto = :idObjeto");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $nombre);
                $sentencia->bindParam(":descripcion", $descripcion);
                $sentencia->bindParam(":idObjeto", $idObjeto);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para eliminar un objeto de la base de datos
    public function eliminarObjeto($conexPDO, $idObjeto)
    {
        if ($conexPDO != null && isset($idObjeto)) {
            try {
                // Se define la sentencia SQL para eliminar el objeto
                $sentencia = $conexPDO->prepare("DELETE FROM proyecto.Objeto WHERE idObjeto = :idObjeto");

                // Se asigna el valor del ID del objeto al placeholder de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $idObjeto);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para obtener todas las cajas de la base de datos
    public function obtenerCajas($conexPDO)
    {
        if ($conexPDO != null) {
            try {
                // Se define la sentencia SQL para obtener todas las cajas
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja");

                // Se ejecuta la sentencia SQL y se devuelve el resultado
                $sentencia->execute();
                return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para obtener una caja por su ID
    public function obtenerCajaPorID($conexPDO, $idCaja)
    {
        if ($conexPDO != null && isset($idCaja)) {
            try {
                // Se define la sentencia SQL para obtener la caja por su ID
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja WHERE idCaja = :idCaja");

                // Se asigna el valor del ID de la caja al placeholder de la sentencia SQL
                $sentencia->bindParam(":idCaja", $idCaja);

                // Se ejecuta la sentencia SQL y se devuelve el resultado
                $sentencia->execute();
                return $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // En caso de error, se muestra un mensaje y se devuelve null
                echo "Error al obtener la caja por su ID: " . $e->getMessage();
                return null;
            }
        } else {
            // Si los parámetros no son válidos, se muestra un mensaje y se devuelve null
            echo "Error: parámetros inválidos";
            return null;
        }
    }
}
