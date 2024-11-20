<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR PLANES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<img src="IMG/imgbanner.png" height="40%" width="100%"> 
<?php require_once "LAYOUT/header.php"; ?>   
<?php
require_once "../controlador/PlanesControler.php";

// Verifica si se recibió el ID del plan
if (!isset($_GET['id'])) {
    header("Location: planesadm.php");
    exit();
}

$id = $_GET['id'];
$planes = PlanesControler::mostrarPlanes();
$plan = null;

// Busca el plan correspondiente al ID
foreach ($planes as $p) {
    if ($p['ID_Planes'] == $id) {
        $plan = $p;
        break;
    }
}

// Si no se encuentra el plan, redirige a la página principal
if (!$plan) {
    header("Location: planesadm.php");
    exit();
}

// Manejo del formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $precio = $_POST['precio'];
    $idVuelo = $_POST['id_vuelo'];
    $idHotel = $_POST['id_hotel'];
    $imagen = $_FILES['imagen']; // Recibe la nueva imagen (si hay)
    $fecha = $_POST['fecha'];  // La fecha recibida

// Aquí permitimos los separadores '/' o '-'
$fechaConvertida = DateTime::createFromFormat('Y/m/d', $fecha);  // Intentar el formato con '/'
if (!$fechaConvertida) {
    $fechaConvertida = DateTime::createFromFormat('Y-m-d', $fecha);  // Intentar el formato con '-'
}

if ($fechaConvertida) {
    $fecha = $fechaConvertida->format('Y-m-d');  // Convertir al formato 'YYYY-MM-DD' para almacenar en la base de datos
} else {
    echo "<p class='error'>La fecha proporcionada no es válida. Por favor, ingrese una fecha válida.</p>";
    exit();  // Detener ejecución si la fecha no es válida
}


    
    // Llama al controlador para actualizar el plan
    $resultado = PlanesControler::actualizarPlan($id, $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen);

    if ($resultado) {
        header("Location: planesadm.php?mensaje=actualizado");
        exit();
    } else {
        echo "<p>Error al actualizar el plan.</p>";
    }
}
?>


<DIV>
<h1 class="text-center">Editar Plan</h1>

<form action="ActualizarPlanes.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $plan['Nombre']; ?>" required /><br>

    <label for="contenido">Contenido del Lugar:</label>
    <input type="text" name="contenido" value="<?= $plan['Contenido_Lugar']; ?>" required /><br>

    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?= $plan['Precio']; ?>" required /><br>

    <label for="fecha">Fecha:</label>
<input type="date" name="fecha" value="<?= $plan['Fecha']; ?>" required pattern="[\d]{2}[-/][\d]{2}[-/][\d]{4}" placeholder="DD-MM-YYYY" /><br>


    <label for="id_vuelo">ID del Vuelo:</label>
    <input type="number" name="id_vuelo" value="<?= $plan['ID_Vuelo']; ?>" required /><br>

    <label for="id_hotel">ID del Hotel:</label>
    <input type="number" name="id_hotel" value="<?= $plan['ID_Hotel']; ?>" required /><br>

    <label for="imagen">Nueva Imagen (si deseas cambiarla):</label>
    <input type="file" name="imagen" accept="image/*" /><br>

    <button type="submit">Actualizar</button>
</form>
</DIV>

<?php require_once "LAYOUT/footer.php"; ?>
</body>
</html>