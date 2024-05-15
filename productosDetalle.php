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
    <h4 class="card-title"><?php echo $libro['nombre'] ?></h4>

    
    <p class="card-text"><?php echo $libro['detalles'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Editorial: --> <strong><?php echo $libro['editorial'] ?></strong>  </li>
    <li class="list-group-item">Autor: &nbsp;&nbsp;&nbsp; --> <strong><?php echo $libro['autor'] ?></strong>  </li></li>
    <li class="list-group-item">ISBN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --> <strong><?php echo $libro['isbn'] ?></strong>  </li></li>
    <li class="list-group-item">Paginas: --> <strong><?php echo $libro['paginas'] ?></strong>  </li></li>
  </ul>
  <div class="card-body">
    
    <a name="" id="" class="btn btn-primary btn-lg mb-4"" href="https://www.google.com/search?q=<?php echo $libro['isbn']?>" target="_blank" role="button">Buscar mas..</a>
    <a name="" id="" class="btn btn-warning btn-lg mb-4"" href="./productos.php"role="button">Regresar</a>
  </div>
</div>



<?php include ("template/pie.php"); ?>