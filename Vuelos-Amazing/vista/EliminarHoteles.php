<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../controlador/HotelesControler.php";

// Verifica si se recibió el ID del plan
if (!isset($_GET['id'])) {
    header("Location: hotelesadm.php");
    exit();
}

$id = $_GET['id'];

// Llama al controlador para eliminar el plan
$resultado = HotelesControler::eliminarHotel($id);

if ($resultado) {
    header("Location: hotelesadm.php?mensaje=eliminado");
} else {
    echo "<p>Error al eliminar el plan.</p>";
}
exit();
?>