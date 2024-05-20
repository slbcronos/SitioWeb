<?php include ("template/cabecera.php"); ?>

<?php

include ("administrador/config/bd.php");

//consulata al la base de datos
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros ORDER BY nombre"); // cambiado para ordenar por nombre 19-05-2024
//$sentenciaSQL = $conexion->prepare("SELECT * FROM `libros` WHERE nombre LIKE '%java%'"); //proxima
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<br/><br/>
<?php foreach ($listaLibros as $libro) { ?>
  
    <div class="col-md-3">
        <div class="card">
            
            <img class="card-img-top" src="./img/<?php echo $libro['imagen']; ?>" alt="Imagen" height="400" />
            <div class="card-body">
                <h5 class="text-truncate"><?php echo $libro['nombre']; ?> </h5>
                <a name="" id="" class="btn btn-primary btn-lg" href="productosDetalle.php?iDLibro=<?php echo $libro['id']; ?>"
                    role="button">Detalles..</a>
            </div>

        </div>
        <br /> <!-- para separar los libros entre si -->
    </div>

<?php } ?>



<?php include ("template/pie.php"); ?>