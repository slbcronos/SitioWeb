<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../index.php');
} else {
    if ($_SESSION['usuario'] == "ok") {
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}

?>

<!doctype html>
<html lang="es-MX">

<head>
    <title>Administrador de Libros</title>
    <link rel="icon" href="../Fab-libros.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

</head>

<body>
    <?php //revisar esto que cambio en la linea 23 en el archivo de notas, por eso falla ?>
    <?php $url = "http://" . $_SERVER['HTTP_HOST']; ?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador del Sitio Web <span
                    class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/productos.php">Libros</a>
            <a class="nav-item nav-link"
                href="<?php echo $url; ?>/administrador/seccion/editoriales.php">Editoriales</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/autores.php">Autores</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/tipos.php">Tipos de
                Publicacion</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/generos.php">Generos</a>

            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
        </div>
    </nav>


    <div class="container">
        <br />
        <div class="row">