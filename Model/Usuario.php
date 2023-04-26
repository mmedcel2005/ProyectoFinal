<?php

class UsuarioModelo {

  // Función para obtener todos los usuarios
  public function obtenerUsuarios() {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "mydb");

    // Consulta SQL para obtener todos los usuarios
    $consulta = "SELECT * FROM Usuario";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Crear un arreglo para almacenar los usuarios
    $usuarios = array();

    // Recorrer el resultado de la consulta y almacenar los usuarios en el arreglo
    while ($fila = $resultado->fetch_assoc()) {
      $usuarios[] = $fila;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Devolver el arreglo con los usuarios
    return $usuarios;
  }

  // Función para obtener un usuario por ID
  public function obtenerUsuarioPorId($id) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "mydb");

    // Consulta SQL para obtener el usuario con el ID especificado
    $consulta = "SELECT * FROM Usuario WHERE idUsuario = $id";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Obtener el usuario (debería ser solo uno)
    $usuario = $resultado->fetch_assoc();

    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Devolver el usuario
    return $usuario;
  }

  // Función para agregar un nuevo usuario
  public function agregarUsuario($nombre, $apellidos, $correo, $contraseña, $direccion, $salt, $cantTokens, $imagen) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "mydb");

    // Consulta SQL para agregar un nuevo usuario
    $consulta = "INSERT INTO Usuario (nombre, apellidos, correo, contraseña, direccion, salt, cantTokens, imagen) VALUES ('$nombre', '$apellidos', '$correo', '$contraseña', '$direccion', '$salt', $cantTokens, '$imagen')";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Devolver el resultado de la operación (true si se agregó correctamente, false en caso contrario)
    return $resultado;
  }

  // Función para actualizar un usuario existente
  public function actualizarUsuario($id, $nombre, $apellidos, $correo, $contraseña, $direccion, $salt, $cantTokens, $imagen) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "mydb");

    // Consulta SQL para actualizar el usuario con el ID especificado
    $consulta = "UPDATE Usuario SET nombre = '$nombre', apellidos = '$apellidos
