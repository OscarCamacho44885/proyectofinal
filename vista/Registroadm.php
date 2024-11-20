<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<img src="IMG/imgbanner.png" height="40%" width="100%">
<?php require_once('LAYOUT/header.php'); ?>
    <div class="text-center">
        <br><br>
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col">
                        <h1>Inicia Sesión</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="formcorreo" id="floatingInput">
                            <label for="floatingInput">Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="formcontrasena" id="floatingPassword">
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <div class="form-floating text-center mb-4">
                            <button type="submit" class="btn btn-primary">Inicia</button>
                        </div>
                    </div>
                    <div class="col">
                        <h1>Regístrate</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="formnombre" id="floatingInput">
                            <label for="floatingInput">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="formcorreo" id="floatingInput">
                            <label for="floatingInput">Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="formnuevacontrasena" id="floatingPassword">
                            <label for="floatingPassword">Nueva Contraseña</label>
                        </div>
                        <div class="form-floating text-center mb-4">
                            <button type="submit" class="btn btn-primary">Regístrate</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br><br><br><br><br><br>
    </div>
    <?php require_once('LAYOUT/footer.php'); ?>
</body>
</html>