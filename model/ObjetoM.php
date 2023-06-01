<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class ObjetoM
{
    // Función para guardar el objeto en la base de datos
    public function guardarObjeto($conexPDO, $objeto)
    {
        if ($conexPDO != null) {
            try {
                // Se define la sentencia SQL para insertar un nuevo objeto
                $sentencia = $conexPDO->prepare("INSERT INTO proyecto.objeto (nombre, descripcion, imagen, calidad, precio) VALUES (:nombre, :descripcion, :imagen, :calidad, :precio)");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nombre", $objeto["nombre"]);
                $sentencia->bindParam(":descripcion", $objeto["descripcion"]);
                $sentencia->bindParam(":imagen", $objeto["imagen"]);
                $sentencia->bindParam(":calidad", $objeto["calidad"]);
                $sentencia->bindParam(":precio", $objeto["precio"]);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para actualizar un objeto en la base de datos
    public function actualizarObjeto($conexPDO, $objeto)
    {
        if ($conexPDO != null && isset($objeto["idObjeto"])) {
            try {
                // Se define la sentencia SQL para actualizar el objeto
                $sentencia = $conexPDO->prepare("UPDATE proyecto.objeto SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen, calidad = :calidad, precio = :precio WHERE idObjeto = :idObjeto");

                // Se asignan los valores de los atributos a los placeholders de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $objeto["idObjeto"]);
                $sentencia->bindParam(":nombre", $objeto["nombre"]);
                $sentencia->bindParam(":descripcion", $objeto["descripcion"]);
                $sentencia->bindParam(":imagen", $objeto["imagen"]);
                $sentencia->bindParam(":calidad", $objeto["calidad"]);
                $sentencia->bindParam(":precio", $objeto["precio"]);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para eliminar un objeto de la base de datos
    public function eliminarObjeto($conexPDO, $objeto)
    {
        if ($conexPDO != null && isset($objeto["idObjeto"])) {
            try {
                // Se define la sentencia SQL para eliminar el objeto
                $sentencia = $conexPDO->prepare("DELETE FROM proyecto.objeto WHERE idObjeto = :idObjeto");

                // Se asigna el valor del ID del objeto al placeholder de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $objeto["idObjeto"]);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                return $sentencia->execute();
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Función para obtener un objeto de la base de datos por su ID
    public function obtenerObjetoPorID($idObjeto, $conexPDO)
    {
        if ($conexPDO != null && isset($idObjeto)) {
            try {
                // Se define la sentencia SQL para obtener el objeto por su ID
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.objeto WHERE idObjeto = :idObjeto");

                // Se asigna el valor del ID del objeto al placeholder de la sentencia SQL
                $sentencia->bindParam(":idObjeto", $idObjeto);

                // Se ejecuta la sentencia SQL y se verifica el resultado
                if ($sentencia->execute()) {
                    // Se obtiene el objeto y se devuelve como resultado
                    return $sentencia->fetch();
                }
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return null;
    }

     // Función para obtener todos los objetos de la base de datos
     function obtenerObjetosIntoCaja($cajaId, $conexPDO) {
        global $conexPDO;
      
        // Consulta SQL para obtener los objetos de la caja
        $sql = "SELECT Objeto.*, Objeto_has_Caja.* FROM Objeto
                INNER JOIN Objeto_has_Caja ON Objeto.idObjeto = Objeto_has_Caja.Objeto_idObjeto
                WHERE Objeto_has_Caja.Caja_idCaja = :cajaId";
      
        // Preparar la consulta
        $stmt = $conexPDO->prepare($sql);
        $stmt->bindParam(':cajaId', $cajaId);
      
        // Ejecutar la consulta
        $stmt->execute();
      
        // Obtener los resultados de la consulta
        $resultados = $stmt->fetchAll();
      
        return $resultados;
      }
      


    // Función para obtener todos los objetos de la base de datos
    public function obtenerTodosLosObjetos($conexPDO)
    {
        if ($conexPDO != null) {
            try {
                // Se define la sentencia SQL para obtener todos los objetos
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.objeto");

                // Se ejecuta la sentencia SQL y se verifica el resultado
                if ($sentencia->execute()) {
                    // Se obtienen todos los objetos y se devuelven como resultado
                    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                // Si ocurre algún error, se muestra el mensaje de error
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
        return null;
    }
}
