<?php include ("template/cabecera.php"); ?>

<?php 

include("administrador/config/bd.php");

//consulata al la base de datos
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaLibros as $libro){ ?>
    <div class="col-md-3" >
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $libro['imagen']; ?>" alt="Imagen" height="400" />
        <div class="card-body">
            <h5 class="text-truncate"><?php echo $libro['nombre']; ?></h5>
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="productosDetalle.php?iDLibro=<?php echo $libro['id']; ?>"
                role="button"
                >Ver mas..</a>
            
        </div>
    </div>
</div>

<?php } ?>







<?php include ("template/pie.php"); ?>