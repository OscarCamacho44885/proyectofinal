<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR VUELOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<img src="IMG/imgbanner.png" height="40%" width="100%"> 
<?php require_once "LAYOUT/header.php"; ?>
<?php 
require_once "../controlador/PlanesControler.php";


// Inicializar variables
$mostrarTabla = false;
$planes = [];
$diaSeleccionado = $mesSeleccionado = $anioSeleccionado = null;

// Verificar si se presionó algún botón y establecer qué mostrar
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['accion'])) {
    if ($_POST['accion'] === "buscar") {
        // Capturar las selecciones de fecha si están presentes
        $diaSeleccionado = $_POST['dia_salida'] ?? null;
        $mesSeleccionado = $_POST['mes_salida'] ?? null;
        $anioSeleccionado = $_POST['anio_salida'] ?? null;

        // Si se presionó "Buscar", mostrar la tabla de planes
        $mostrarTabla = true;
        $planes = PlanesControler::mostrarPlanes(); // Obtener los planes
    }
}
?>

<h1 class="text-center">Planes de Vuelo</h1>
<div class="mb-3">
    <a href="AgregarPlanes.php" class="btn btn-success">Agregar Nuevo Plan</a>
</div>

<!-- Botones para cambiar el tipo de vuelo -->
<form method="post" action="">
    <button type="submit" name="accion" value="opcion1" class="btn btn-primary">Vuelo sencillo</button>
    <button type="submit" name="accion" value="opcion2" class="btn btn-secondary">Vuelo redondo</button>
    <br><br>
    <?php if (isset($_POST['accion']) && $_POST['accion'] === "opcion1"): ?>
        <p>Elije la fecha de salida</p>
        <!-- Selección de día -->
        <select class="form-select mb-2" name="dia_salida" aria-label="Elige el día" style="width: 30%; display: inline-block;">
            <option selected>Elige el día</option>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de mes -->
        <select class="form-select mb-2" name="mes_salida" aria-label="Elige el mes" style="width: 30%; display: inline-block;">
            <option selected>Elige el mes</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de año -->
        <select class="form-select mb-2" name="anio_salida" aria-label="Elige el año" style="width: 30%; display: inline-block;">
            <option selected>Elige el año</option>
            <?php for ($i = date("Y"); $i <= date("Y") + 10; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!--opcion dos-->
    <?php elseif (isset($_POST['accion']) && $_POST['accion'] === "opcion2"): ?>
        <p>Elije la fecha de salida</p>
        <!-- Selección de día -->
        <select class="form-select mb-2" name="dia_salida" aria-label="Elige el día" style="width: 30%; display: inline-block;">
            <option selected>Elige el día</option>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de mes -->
        <select class="form-select mb-2" name="mes_salida" aria-label="Elige el mes" style="width: 30%; display: inline-block;">
            <option selected>Elige el mes</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de año -->
        <select class="form-select mb-2" name="anio_salida" aria-label="Elige el año" style="width: 30%; display: inline-block;">
            <option selected>Elige el año</option>
            <?php for ($i = date("Y"); $i <= date("Y") + 10; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <p>Elije la fecha de entrada</p>
        <!-- Selección de día -->
        <select class="form-select mb-2" name="dia_salida" aria-label="Elige el día" style="width: 30%; display: inline-block;">
            <option selected>Elige el día</option>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de mes -->
        <select class="form-select mb-2" name="mes_salida" aria-label="Elige el mes" style="width: 30%; display: inline-block;">
            <option selected>Elige el mes</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- Selección de año -->
        <select class="form-select mb-2" name="anio_salida" aria-label="Elige el año" style="width: 30%; display: inline-block;">
            <option selected>Elige el año</option>
            <?php for ($i = date("Y"); $i <= date("Y") + 10; $i++): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>
    <?php endif; ?>
    <br><br>

    <br><br>
    <!-- Botón Buscar -->
    <button type="submit" name="accion" value="buscar" class="btn btn-danger">Buscar</button>
</form>

<br><br>

<!-- Mostrar el mensaje de fecha seleccionada -->
<?php if ($mostrarTabla): ?>
    <div class="alert alert-info text-center">
        <strong>Vuelos disponibles para:</strong><br>
        Día: <?= $diaSeleccionado ?: 'No especificado'; ?>, 
        Mes: <?= $mesSeleccionado ?: 'No especificado'; ?>, 
        Año: <?= $anioSeleccionado ?: 'No especificado'; ?>
    </div>
<?php endif; ?>

<!-- Mostrar la tabla de planes -->
<?php if ($mostrarTabla): ?>
    <?php if (!empty($planes)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contenido</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <div class="container">
    <div class="row">
        <?php foreach ($planes as $plan): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Imagen -->
                    <?php if (!empty($plan['Imagen'])): ?>
                        <img src="imagenes/<?= $plan['Imagen']; ?>" class="card-img-top" alt="<?= $plan['Nombre']; ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="imagenes/default.png" class="card-img-top" alt="Sin imagen" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>

                    <!-- Contenido -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $plan['Nombre']; ?></h5>
                        <p class="card-text">
                            <strong>Contenido:</strong> <?= $plan['Contenido_Lugar']; ?><br>
                            <strong>Precio:</strong> $<?= number_format($plan['Precio'], 2); ?><br>
                            <strong>Fecha:</strong> <?= $plan['Fecha']; ?><br>
                            <strong>ID Vuelo:</strong> <?= $plan['ID_Vuelo']; ?><br>
                            <strong>ID Hotel:</strong> <?= $plan['ID_Hotel']; ?>
                        </p>
                        <a href="comprar.php?id=<?= $plan['ID_Planes']; ?>" class="btn btn-warning btn-sm">Comprar</a>
                        <a href="editar.php?id=<?= $plan['ID_Planes']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?= $plan['ID_Planes']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <?php else: ?>
        <p class="text-center">No hay planes disponibles.</p>
    <?php endif; ?>

    <!-- Enlace a hoteles -->
    <div class="mt-4 text-center">
        <a href="vista/LAYOUT/hoteles.php" class="btn btn-link">
            ¿Quieres reservar un hotel?
        </a>
    </div>
<?php endif; ?>

<?php require_once "LAYOUT/footer.php"; ?>
</body>
</html>