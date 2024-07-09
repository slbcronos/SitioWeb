<?php
session_start();

if ($_POST) {
    include ('./config/bd.php'); // referencia a Base de Datos

    $sentencia = $conexion->prepare("SELECT *,count(*) as n_usuario 
    FROM `tbl_usuarios` 
    WHERE usuario=:usuario 
    AND password=:password");

    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];

    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->bindParam(':password', $contrasenia);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    if ($registro['n_usuario'] > 0) {
        $_SESSION['usuario'] = $registro["usuario"];
        $_SESSION['logueado'] = true;
        header("Location:inicio.php");
    } else {
        $mensaje = "Error: El usuario o contraseña es incorrecto";
    }

}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <br />

    <main class="container">
        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="login.png" class="img-fluid rounded-top" alt="" />
                    <div class="card-header"><strong>Login</strong></div>
                    <div class="card-body">
                        <?php if (isset($mensaje)) { ?>

                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje; ?></strong>
                            </div>
                        <?php } ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario"
                                    aria-describedby="helpId" placeholder="Escriba su usuario" />
                            </div>
                            <div class="mb-3">
                                <label for="contrasenia" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenia" id="contrasenia"
                                    aria-describedby="helpId" placeholder="Escriba su contraseña" />
                            </div>


                            <button type="submit" class="btn btn-primary">
                                Entrar al Sistema
                            </button>

                            <a name="" id="" class="btn btn-danger" href="../index.php" role="button">Cancelar</a>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>