<?php
require_once "../controlador/VuelosControler.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (VuelosControler::eliminarVuelo($id)) {
        header("Location: vuelosadm.php"); // Redirigir a la página de administración de vuelos
    } else {
        echo "Error al eliminar el vuelo.";
    }
} else {
    echo "ID de vuelo no especificado.";
}
?>


