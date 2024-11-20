<?php
require_once "../modelo/PlanesModel.php";

class PlanesControler {
    public static function mostrarPlanes() {
        return PlanesModel::obtenerPlanes();
    }

    public static function actualizarPlan($id, $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagenFile = null) {
        // Si se ha subido una nueva imagen
        if ($imagenFile && $imagenFile['error'] === 0) {
            // Ruta para guardar la imagen
            $directorio = "../vista/IMG/";
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true); // Crear la carpeta si no existe
            }
    
            $rutaImagen = $directorio . basename($imagenFile['name']);
            if (move_uploaded_file($imagenFile['tmp_name'], $rutaImagen)) {
                // Guardar solo el nombre de la imagen en la base de datos
                $nombreImagen = basename($imagenFile['name']);
            } else {
                return false; // Error al mover la imagen
            }
        } else {
            // Si no se sube una nueva imagen, mantener la imagen anterior
            $nombreImagen = null;  // Usamos el nombre de la imagen anterior (esto lo manejaremos más tarde)
        }
    
        // Llamar al modelo para actualizar el plan con los datos
        return PlanesModel::actualizarPlan($id, $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $nombreImagen);
    }

    public static function eliminarPlan($id) {
        return PlanesModel::eliminarPlan($id);
    }   

    public static function insertarPlan($nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagenFile) {
        // Ruta para guardar la imagen
        $directorio = "../vista/IMG/";
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true); // Crear la carpeta si no existe
        }
    
        $rutaImagen = $directorio . basename($imagenFile['name']);
        if (move_uploaded_file($imagenFile['tmp_name'], $rutaImagen)) {
            // Guardar solo el nombre de la imagen en la base de datos
            $nombreImagen = basename($imagenFile['name']);
            return PlanesModel::insertarPlan($nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $nombreImagen);
        } else {
            return false; // Error al mover la imagen
        }
    }
    

    
}
?>

