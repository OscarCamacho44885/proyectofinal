
<?php
require_once "../controlador/PlanesControler.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $idVuelo = $_POST['id_vuelo'];
    $idHotel = $_POST['id_hotel'];
    $imagen = $_FILES['imagen'];

    $resultado = PlanesControler::insertarPlan($nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen);

    if ($resultado) {
        header("Location: planesadm.php?mensaje=agregado");
    } else {
        echo "<p>Error al agregar el plan.</p>";
    }
}
?>




<h1 class="text-center">Agregar Nuevo Plan</h1>
<form method="POST" action="AgregarPlanes.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Plan</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="contenido" class="form-label">Contenido</label>
        <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
    </div>
    <div class="mb-3">
        <label for="id_vuelo" class="form-label">ID del Vuelo</label>
        <input type="number" class="form-control" id="id_vuelo" name="id_vuelo" required>
    </div>
    <div class="mb-3">
        <label for="id_hotel" class="form-label">ID del Hotel</label>
        <input type="number" class="form-control" id="id_hotel" name="id_hotel" required>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Plan</button>
</form>

<?php require_once "LAYOUT/footer.php"; ?>
