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


}