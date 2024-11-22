<?php
require_once "Conexion.php";

class AdminsModel {
    public static function insertarAdmin($nombre, $correo, $password) {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta
        $sql = "INSERT INTO admins (Nombre, Correo, Pass) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql); // Preparar la sentencia

        // Asociar parámetros
        $stmt->bind_param("sss", $nombre, $correo, $password); // Tres cadenas: nombre, correo y contraseña

        // Ejecutar la consulta
        $resultado = $stmt->execute();

        // Cerrar la declaración y la conexión
        $stmt->close();
        $conn->close();

        return $resultado; // Retorna true si la inserción fue exitosa
    }
}
?>