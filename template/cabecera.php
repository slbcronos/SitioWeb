<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <title>Libreria Express</title>
    <link rel="icon" href="./Fab-libros.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="ImgBiblio.png" width="70px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    <a class="nav-link" href="productos.php">Libros</a>
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                    <a class="nav-link" href="administrador/index.php">Login</a>
                </div>
                <!-- Busqueda aqui queda a un costado del menu -->
            </div>
            <!-- Envio de Busqueda-->
            <form class="d-flex" role="search" method="post" action="productosBuscar.php">

                <select class="form-select" aria-label="Default select example" name="tipoBusqueda" margin-left="25px">
                    <option selected>Tipo de Busqueda</option>
                    <option value="nombre">Nombre de Libro</option>
                    <option value="editorial">Editorial</option>
                    <option value="autor">Autor</option>
                </select>
                &nbsp&nbsp
                <input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Search" name="Buscar" value="">
                <button class="btn btn-outline-success" type="submit" name="buscar">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <br />
        <div class="row">