<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $username = "root";
        $password = "root";
        $database = "vuelosamazing";

        // Crear conexión
        $conn = new mysqli($host, $username, $password, $database);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>