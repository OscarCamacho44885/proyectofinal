<?php
require_once "Conexion.php";

class PlanesModel {
    public static function obtenerPlanes() {
        $conn = Conexion::conectar();
        $sql = "SELECT * FROM planes";
        $result = $conn->query($sql);

        $planes = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $planes[] = $row;
            }
        }
        $conn->close();
        return $planes;
    }

    public static function actualizarPlan($id, $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen = null) {
        $conn = Conexion::conectar();
    
        if ($imagen) {
            // Si se pasa una nueva imagen, actualizamos el campo de imagen también
            $sql = "UPDATE planes SET Nombre = ?, Contenido_Lugar = ?, Precio = ?, Fecha = ?, ID_Vuelo = ?, ID_Hotel = ?, Imagen = ? WHERE ID_Planes = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdisisi", $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen, $id);
        } else {
            // Si no se pasa una nueva imagen, actualizamos solo los campos de texto
            $sql = "UPDATE planes SET Nombre = ?, Contenido_Lugar = ?, Precio = ?, Fecha = ?, ID_Vuelo = ?, ID_Hotel = ? WHERE ID_Planes = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdisii", $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $id);
        }
    
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $resultado;
    }

    public static function eliminarPlan($id) {
        $conn = Conexion::conectar();
        $sql = "DELETE FROM planes WHERE ID_Planes = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $resultado; // Retorna true si la eliminación fue exitosa
    }

    public static function insertarPlan($nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen) {
        $conn = Conexion::conectar();
        $sql = "INSERT INTO planes (Nombre, Contenido_Lugar, Precio, Fecha, ID_Vuelo, ID_Hotel, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssis", $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen);
    
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $resultado; // Retorna true si la inserción fue exitosa
    }
    
}
?>


