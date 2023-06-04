<?php
// Se define el namespace al que pertenece la clase
namespace model;

require_once("Utils.php");

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

// Se define la clase Usuario
class CajasM
{
    public function actualizarCaja($caja, $conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL de actualización
                $sentencia = $conexPDO->prepare("UPDATE proyecto.Caja SET nombre = :nombre, estado = :estado, categoria = :categoria, precio = :precio WHERE idCaja = :id");
                $sentencia->bindParam(':nombre', $caja["nombre"]);
                $sentencia->bindParam(':estado', $caja["estado"]);
                $sentencia->bindParam(':categoria', $caja["categoria"]);
                $sentencia->bindParam(':precio', $caja["precio"]);
                $sentencia->bindParam(':id', $caja["id"]);

                // Se ejecuta la sentencia SQL
                $sentencia->execute();

                // Se verifica si la actualización fue exitosa
                if ($sentencia->rowCount() > 0) {
                    return true; // Se actualizó la caja exitosamente
                } else {
                    return false; // No se encontró la caja con el ID proporcionado
                }
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Método para obtener los registros de la tabla Caja
    public function obtenerCajasPorID($cajaId, $conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL con el filtro de ID
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja WHERE idCaja = :id");
                $sentencia->bindParam(':id', $cajaId);

                // Se ejecuta la sentencia SQL y se retornan los resultados
                $sentencia->execute();

                // Devolvemos los datos en un array asociativo
                return $sentencia->fetch();
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    // Método para obtener los registros de la tabla usuarios
    public function obtenerCajas($conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja");
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

    public function obtenerCajasEstado($estado, $conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja WHERE estado=:estado");
                $sentencia->bindParam(':estado', $estado);
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

    public function obtenerCajasCategoria($categoria, $conexPDO)
    {
        // Verifica si la conexión a la BD es válida
        if ($conexPDO != null) {
            try {
                // Se define la consulta SQL
                $sentencia = $conexPDO->prepare("SELECT * FROM proyecto.Caja WHERE categoria=:categoria");
                $sentencia->bindParam(':categoria', $categoria);

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
}
