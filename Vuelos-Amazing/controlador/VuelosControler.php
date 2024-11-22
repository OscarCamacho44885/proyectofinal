<?php
require_once "../modelo/VuelosModel.php";

class VuelosControler {
    public static function mostrarVuelos() {
        return VuelosModel::obtenerVuelos();
    }

    public static function agregarVuelo($destino, $precio, $fechaVuelo, $fechaAterrizaje) {
        return VuelosModel::agregarVuelo($destino, $precio, $fechaVuelo, $fechaAterrizaje);
    }

    public static function actualizarVuelo($id, $destino, $precio, $fechaVuelo, $fechaAterrizaje) {
        return VuelosModel::actualizarVuelo($id, $destino, $precio, $fechaVuelo, $fechaAterrizaje);
    }

    public static function eliminarVuelo($id) {
        return VuelosModel::eliminarVuelo($id);
    }
}
?>
