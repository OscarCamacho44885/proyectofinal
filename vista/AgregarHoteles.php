<?php
require_once "../controlador/HotelesControler.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $precio = $_POST['precio'];
    $tiempo = $_POST['tiempo'];
    $imagen = $_FILES['imagen'];

    // Llama al controlador para insertar el nuevo hotel
    $resultado = HotelesControler::insertarHotel($nombre, $lugar, $precio, $tiempo, $imagen);

    if ($resultado) {
        header("Location: hotelesadm.php?mensaje=agregado");
    } else {
        echo "<p>Error al agregar el hotel.</p>";
    }
}
?>

<h1 class="text-center">Agregar Nuevo Hotel</h1>
<form method="POST" action="AgregarHoteles.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Hotel</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="lugar" class="form-label">Lugar</label>
        <input type="text" class="form-control" id="lugar" name="lugar" required>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="tiempo" class="form-label">Tiempo de Estadía</label>
        <input type="text" class="form-control" id="tiempo" name="tiempo" required>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Hotel</button>
</form>

<?php require_once "LAYOUT/footer.php"; ?>
