<?php
require_once "Conexion.php";

class HotelesModel {
    public static function obtenerHoteles() {
        $conn = Conexion::conectar();
        $sql = "SELECT * FROM hoteles";
        $result = $conn->query($sql);

        $hoteles = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $hoteles[] = $row;
            }
        }
        $conn->close();
        return $hoteles;
    }

    public static function actualizarHotel($id, $nombre, $lugar, $precio, $tiempo, $imagen = null) {
        $conn = Conexion::conectar();
    
        if ($imagen) {
            // Si se pasa una nueva imagen, actualizamos el campo de imagen también
            $sql = "UPDATE hoteles SET Nombre_Hotel = ?, Lugar = ?, Precio = ?, Tiempo_estadia = ?, Imagen = ? WHERE ID_Hotel = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdisi", $nombre, $lugar, $precio, $tiempo, $imagen, $id);

        } else{
            // Si no se pasa una nueva imagen, actualizamos solo los campos de texto
            $sql = "UPDATE hoteles SET Nombre_Hotel = ?, Lugar = ?, Precio = ?, Tiempo_estadia = ? WHERE ID_Hotel = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdii", $nombre, $lugar, $precio, $tiempo, $id);

        }
    
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $resultado;
    }

    public static function eliminarHotel($id) {
        $conn = Conexion::conectar();
        $sql = "DELETE FROM hoteles WHERE ID_Hotel = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $resultado;
    }

    public static function insertarHotel($nombre, $lugar, $precio, $tiempo, $imagen) {
        $conn = Conexion::conectar();
        $sql = "INSERT INTO hoteles (Nombre_Hotel, Lugar, Precio, Tiempo_estadia, Imagen) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdis", $nombre, $lugar, $precio, $tiempo, $imagen);
    
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $resultado;
    }
}
?>
