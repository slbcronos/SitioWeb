<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "batman") && ($_POST['contrasenia'] == "sistema")) { // esta linea se tiene que cambiar con una consulta a la base de datos
        $_SESSION["usuario"] = "ok";
        $_SESSION["nombreUsuario"] = "batman";
        header('Location:inicio.php');

    } else {
        $mensaje = "Error: El usuario o contraseña son incorrectos";
    }

}

?>

<!doctype html>
<html lang="es-MX">


<head>
    <title>Administracion del Sitio</title>
    <link rel="icon" href="./Fab-libros.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>



    <!-- Section: Design Block -->
    <section class=" text-center text-lg-start">
        <style>
            .rounded-t-5 {
                border-top-left-radius: 0.5rem;
                border-top-right-radius: 0.5rem;
            }

            @media (min-width: 992px) {
                .rounded-tr-lg-0 {
                    border-top-right-radius: 0;
                }

                .rounded-bl-lg-5 {
                    border-bottom-left-radius: 0.5rem;
                }
            }
        </style>


        <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                        class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                </div>
                <div class="col-lg-8">
                    <div class="card-body py-5 px-md-5">
                        <h1>Administrador</h1>
                        <br />
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                        <form method="post">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" class="form-control" name="usuario"
                                    placeholder="Escribe tu Usuario" />
                                <label class="form-label" for="form2Example1">Usuario</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" class="form-control" name="contrasenia"
                                    placeholder="Escribe tu Contraseña" />
                                <label class="form-label" for="form2Example2">Contraseña</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block mb-4">Acceder al Admin</button>


                            <a name="" id="" class="btn btn-danger btn-block mb-4"" href="
                                ../index.php"role="button">Cancelar</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->



</body>

</html>