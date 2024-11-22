<?php
require_once "Conexion.php";

class ClienteModel {
    public static function insertarCliente($nombre, $Apaterno, $Amaterno, $cell, $correo, $password) {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta
        $sql = "INSERT INTO cliente (Nombres, Ape_Paterno, Ape_Materno, Numero_Telefono, Correo, Pass) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql); // Preparar la sentencia

        // Asociar parámetros
        $stmt->bind_param("ssssss", $nombre, $Apaterno, $Amaterno, $cell, $correo, $password); // Tres cadenas: nombre, correo y contraseña

        // Ejecutar la consulta
        $resultado = $stmt->execute();

        // Cerrar la declaración y la conexión
        $stmt->close();
        $conn->close();

        return $resultado; // Retorna true si la inserción fue exitosa
    }
}
?>