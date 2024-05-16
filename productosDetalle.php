<?php include ("template/cabecera.php"); ?>

<?php
include ("administrador/config/bd.php");


//echo "El ID del Libro es: ". $_GET["iDLibro"];
$idLibro = $_GET["iDLibro"];
//echo $idLibro;
//echo $IdLibro[0];

//$sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=:id");
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=$idLibro");

$sentenciaSQL->execute();
$libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

?>

<div class="card mb-12" style="max-width: 100%;">
  <div class="row g-2">
    <div class="col-md-6">
      <img src="./img/<?php echo $libro['imagen']; ?>" class="card-img-top" alt="..." height="700">

    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h2 class="card-title"><?php echo $libro['nombre'] ?></h2>
        <p class="card-text"><?php echo $libro['detalles'] ?></p>

        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong><h5>Editorial:&nbsp;</strong> <?php echo $libro['editorial'] ?> </h5></li>
          <li class="list-group-item"><strong><h5>Autor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $libro['autor'] ?> </h5></li>
          <li class="list-group-item"><strong><h5>ISBN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php echo $libro['isbn'] ?> </h5></li>
          <li class="list-group-item"><strong><h5>Paginas:&nbsp;&nbsp;</strong> <?php echo $libro['paginas'] ?> </h5></li>
        </ul>
        <br />
        <a name="" id="" class="btn btn-primary btn-lg mb-4"" href=" https://www.google.com/search?q=<?php echo $libro['isbn'] ?>" target="_blank" role="button">Buscar mas..</a>
        <a name="" id="" class="btn btn-warning btn-lg mb-4"" href=" ./productos.php"role="button">Regresar</a>
      </div>
    </div>
  </div>
</div>

<?php include ("template/pie.php"); ?>