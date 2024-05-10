<?php include('template/cabecera.php'); ?>

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Bienvenido: <?php echo $nombreUsuario;?></h1>
                        <p class="col-md-8 fs-4">
                            Este panel es de uso exclusivo de administrador.
                        </p>
                        <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar Libros</a>

                    </div>
                </div>

            </div>

<?php include('template/pie.php'); ?>
