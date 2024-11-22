<?php
require_once "Conexion.php";

class VuelosModel {
    // Obtener todos los vuelos
    public static function obtenerVuelos() {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM vuelos";
        $result = $conexion->query($query);

        $vuelos = [];
        while ($fila = $result->fetch_assoc()) {
            $vuelos[] = $fila;
        }

        $conexion->close();
        return $vuelos;
    }

    // Agregar un nuevo vuelo
    public static function agregarVuelo($destino, $precio, $fechaVuelo, $fechaAterrizaje) {
        $conexion = Conexion::conectar();
        $query = "INSERT INTO vuelos (Destino, Precio, Fecha_Vuelo, Fecha_Aterrizaje) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sdss", $destino, $precio, $fechaVuelo, $fechaAterrizaje);

        $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();

        return $resultado;
    }

    // Actualizar un vuelo
    public static function actualizarVuelo($id, $destino, $precio, $fechaVuelo, $fechaAterrizaje) {
        $conexion = Conexion::conectar();
        $query = "UPDATE vuelos SET Destino = ?, Precio = ?, Fecha_Vuelo = ?, Fecha_Aterrizaje = ? WHERE ID_Vuelo = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sdssi", $destino, $precio, $fechaVuelo, $fechaAterrizaje, $id);

        $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();

        return $resultado;
    }

    // Eliminar un vuelo
    public static function eliminarVuelo($id) {
        $conexion = Conexion::conectar();
        $query = "DELETE FROM vuelos WHERE ID_Vuelo = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id);

        $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();

        return $resultado;
    }
}
?>

