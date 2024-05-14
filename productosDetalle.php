<?php include ("template/cabecera.php"); ?>

<?php 
include("administrador/config/bd.php");


//echo "El ID del Libro es: ". $_GET["iDLibro"];
$idLibro = $_GET["iDLibro"];
//echo $idLibro;
//echo $IdLibro[0];

//$sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=:id");
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=$idLibro");

$sentenciaSQL->execute();
$libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

?>

<div class="card" style="width: 25rem;">
  <img src="./img/<?php echo $libro['imagen']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $libro['nombre'] ?></h5>

    
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Editorial</li>
    <li class="list-group-item">Autor</li>
    <li class="list-group-item">ISBN</li>
    <li class="list-group-item">Paginas</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="productos.php" class="card-link">Regresar</a>
  </div>
</div>




<?php include ("template/pie.php"); ?>