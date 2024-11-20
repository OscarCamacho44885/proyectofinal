<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QwtQ11evlA5eoG/QAcK97oiMA4LnlGQmKDpv21ZGzOjEWvLHI5mWn8NvfUAm6gno" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Registro</title>
    </head>
    <body>
        <img src="vista/IMG/imgbanner.png" height="40%" width="100%">
        <div class="text-center">
    <br>
    <br>
    <div class="fondo">
        <div class="container">
            <form class="form-floating" action="controlador/validarusuario.php" method="post">
                <div class="row">
                    <div class="col">
                        <h1>Inicia Sesión</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="formcorreo" id="floatingInput" required>
                            <label for="floatingInput">Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="formcontrasena" id="floatingPassword" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <div class="form-floating text-center mb-4">
                            <button type="submit" class="btn btn-primary">Inicia</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center">
            <div class="col"></div>
            <div class="col">
                <div class="mb-5">
                    <p class="text-center m-0">¿No tienes una cuenta? <a href="vista/Registro/registro.php">Registrate</a></p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    
</div>
        <?php require_once('LAYOUT/footer1.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qVKAkXa6f7RAhuPb0zj6vStJO7AR4KsLFpVCvdN2h9I3RzZhPhb9v5GAf6dSVmvs" crossorigin="anonymous"></script>
    </body>   
</html>