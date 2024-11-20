<?php
require_once "../modelo/HotelesModel.php";

class HotelesControler {
    public static function mostrarHoteles() {
        return HotelesModel::obtenerHoteles();
    }

    public static function actualizarHotel($id, $nombre, $lugar, $precio, $tiempo, $imagenFile = null) {
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
            $nombreImagen = null;
        }
    
        // Llamar al modelo para actualizar el hotel con los datos
        return HotelesModel::actualizarHotel($id, $nombre, $lugar, $precio, $tiempo, $nombreImagen);
    }

    public static function eliminarHotel($id) {
        return HotelesModel::eliminarHotel($id);
    }   

    public static function insertarHotel($nombre, $lugar, $precio, $tiempo, $imagenFile) {
        // Ruta para guardar la imagen
        $directorio = "../vista/IMG/";
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true); // Crear la carpeta si no existe
        }
    
        $rutaImagen = $directorio . basename($imagenFile['name']);
        if (move_uploaded_file($imagenFile['tmp_name'], $rutaImagen)) {
            // Guardar solo el nombre de la imagen en la base de datos
            $nombreImagen = basename($imagenFile['name']);
            return HotelesModel::insertarHotel($nombre, $lugar, $precio, $tiempo, $nombreImagen);
        } else {
            return false; // Error al mover la imagen
        }
    }
}
?>
