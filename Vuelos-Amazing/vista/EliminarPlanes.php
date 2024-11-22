<?php
require_once "../controlador/PlanesControler.php";

// Verifica si se recibió el ID del plan
if (!isset($_GET['id'])) {
    header("Location: planesadm.php");
    exit();
}

$id = $_GET['id'];

// Llama al controlador para eliminar el plan
$resultado = PlanesControler::eliminarPlan($id);

if ($resultado) {
    header("Location: planesadm.php?mensaje=eliminado");
} else {
    echo "<p>Error al eliminar el plan.</p>";
}
exit();
?>

