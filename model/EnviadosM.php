<?php
// Se define el namespace al que pertenece la clase
namespace model;

require_once("Utils.php");

// Se importan las clases PDO y PDOException
use \PDO;
use \PDOException;

// Se define la clase Usuario
class EnviadosM
{
    public function agregarObjetoEnviado($idObjeto, $idUsuario, $conexPDO)
    {
        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null && $idUsuario != null && $idObjeto != null) {
            try {
                // Obtenemos la fecha actual
                $fechaActual = date("d-m-Y");
                $estadoEnvio = "Pendiente de envio";

                // Preparamos la sentencia SQL para insertar el objeto enviado
                $sentencia = $conexPDO->prepare("INSERT INTO Enviados (Usuario_idUsuario, Objeto_idObjeto, fecha, estadoEnvio ) VALUES (:idUsuario, :idObjeto, :fecha, :estadoEnvio)");

                // Asignamos los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":idUsuario", $idUsuario);
                $sentencia->bindParam(":idObjeto", $idObjeto);
                $sentencia->bindParam(":fecha", $fechaActual);
                $sentencia->bindParam(":estadoEnvio", $estadoEnvio);

                // Ejecutamos la sentencia SQL
                $sentencia->execute();

                // Retornamos true para indicar que el objeto fue agregado correctamente
                return true;
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        // Si se llega a este punto, significa que hubo un error al agregar el objeto
        return false;
    }

    public function actualizarEstadoEnvio($idEnvio, $nuevoEstado, $conexPDO)
    {
        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null && $idEnvio != null && $nuevoEstado != null) {
            try {
                // Preparamos la sentencia SQL para actualizar el estado de envío
                $sentencia = $conexPDO->prepare("UPDATE Enviados SET estadoEnvio = :nuevoEstado WHERE idEnvio = :idEnvio");

                // Asignamos los valores de los parámetros a los placeholders de la sentencia SQL
                $sentencia->bindParam(":nuevoEstado", $nuevoEstado);
                $sentencia->bindParam(":idEnvio", $idEnvio);

                // Ejecutamos la sentencia SQL
                $sentencia->execute();

                // Retornamos true para indicar que el estado de envío fue actualizado correctamente
                return true;
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        // Si se llega a este punto, significa que hubo un error al actualizar el estado de envío
        return false;
    }

    public function obtenerEnviosUsuario($idUsuario, $conexPDO)
    {
        // Se verifica si los parámetros recibidos son válidos
        if ($conexPDO != null && $idUsuario != null) {
            try {
                // Preparamos la sentencia SQL para obtener los envíos del usuario ordenados por fecha
                $sentencia = $conexPDO->prepare("SELECT E.numEnviados, E.fecha_Envio, E.estadoEnvio, O.idObjeto, O.nombre AS nombreObjeto, O.descripcion, O.imagen, O.calidad, O.precio
                                                FROM Enviados E
                                                INNER JOIN Enviados_has_Objeto EO ON E.numEnviados = EO.Enviados_idEnviados
                                                INNER JOIN Objeto O ON EO.Objeto_idObjeto = O.idObjeto
                                                WHERE E.Usuario_idUsuario = :idUsuario
                                                ORDER BY E.fecha_Envio");

                // Asignamos el valor del parámetro a su placeholder en la sentencia SQL
                $sentencia->bindParam(":idUsuario", $idUsuario);

                // Ejecutamos la sentencia SQL
                $sentencia->execute();

                // Retornamos los resultados obtenidos
                return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Si se produce un error, se muestra un mensaje en pantalla
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        // Si se llega a este punto, significa que hubo un error al obtener los envíos del usuario
        return false;
    }
}
