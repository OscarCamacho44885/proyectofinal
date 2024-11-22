<?php
class Conexion {
    public static function conectar() {
        $host = "sql201.infinityfree.com";
        $username = "if0_37584141";
        $password = "KFHYXnAtdVQtT";
        $database = "if0_37584141_vuelosamazing";

        // Crear la conexión
        $conn = new mysqli($host, $username, $password, $database, 3306);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Establecer la codificación UTF-8 para soportar caracteres especiales
        $conn->set_charset("utf8");

        return $conn;
    }
}
?>