<?php include ('../template/cabecera.php'); ?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtTipo = (isset($_POST['txtTipo'])) ? $_POST['txtTipo'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtEditorial = (isset($_POST['txtEditorial'])) ? $_POST['txtEditorial'] : "";
$txtAutor = (isset($_POST['txtAutor'])) ? $_POST['txtAutor'] : "";
$txtisbn = (isset($_POST['txtisbn'])) ? $_POST['txtisbn'] : "";
$txtPaginas = (isset($_POST['txtPaginas'])) ? $_POST['txtPaginas'] : "";
$txtGenero = (isset($_POST['txtGenero'])) ? $_POST['txtGenero'] : "";
$txtAnio = (isset($_POST['txtAnio'])) ? $_POST['txtAnio'] : "";
//$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtDescripcion1 = (isset($_POST['txtDescripcion1'])) ? $_POST['txtDescripcion1'] : "";
$txtResenia = (isset($_POST['txtResenia'])) ? $_POST['txtResenia'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include ('../config/bd.php'); // referencia a Base de Datos

switch ($accion) {
    case 'Agregar':
        // case agregar
        $sentenciaSQL = $conexion->prepare("INSERT INTO libros (tipoPublicacion,nombre,editorial,autor,isbn,paginas,genero,anio,detalles,reseniaPersonal,imagen) VALUES (:tipoPublicacion,:nombre,:editorial,:autor,:isbn,:paginas,:genero,:anio,:detalles,:reseniaPersonal,:imagen)");//cambia segun la bd
        $sentenciaSQL->bindParam(':tipoPublicacion', $txtTipo);
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':editorial', $txtEditorial);
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->bindParam(':isbn', $txtisbn);
        $sentenciaSQL->bindParam(':paginas', $txtPaginas);
        $sentenciaSQL->bindParam(':genero', $txtGenero);
        $sentenciaSQL->bindParam(':anio', $txtAnio);
        $sentenciaSQL->bindParam(':reseniaPersonal', $txtResenia);
        $sentenciaSQL->bindParam(':detalles', $txtDescripcion1);

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        //header("Location:productos.php");
        //echo "Infomacion Agregada";
        break;

    case 'Modificar':
        $sentenciaSQL = $conexion->prepare("UPDATE libros SET tipoPublicacion=:tipoPublicacion, nombre=:nombre, editorial=:editorial,autor=:autor,isbn=:isbn,paginas=:paginas,genero=:genero,anio=:anio,reseniaPersonal=:reseniaPersonal,detalles=:detalles  WHERE id=:id"); // cambia segun los camops de la bd
        $sentenciaSQL->bindParam(':tipoPublicacion', $txtTipo);
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':editorial', $txtEditorial);
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->bindParam(':isbn', $txtisbn);
        $sentenciaSQL->bindParam(':paginas', $txtPaginas);
        $sentenciaSQL->bindParam(':genero', $txtGenero);
        $sentenciaSQL->bindParam(':anio', $txtAnio);
        $sentenciaSQL->bindParam(':reseniaPersonal', $txtResenia);
        $sentenciaSQL->bindParam(':detalles', $txtDescripcion1);

        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";

            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($libro["imagen"]) && ($libro["imagen"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $libro["imagen"])) {

                    unlink("../../img/" . $libro["imagen"]);
                }

            }

            $sentenciaSQL = $conexion->prepare("UPDATE libros SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        //header("Location:productos.php");

        //echo "Precionado boton modificar";
        break;

    case 'Cancelar':
        header("Location:productos.php");
        //echo "Precionado boton cancelar";
        break;

    case 'Seleccionar':
        $sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtTipo = $libro['tipoPublicacion'];
        $txtNombre = $libro['nombre'];
        $txtImagen = $libro['imagen'];
        $txtEditorial = $libro['editorial'];
        $txtAutor = $libro['autor'];
        $txtisbn = $libro['isbn'];
        $txtPaginas = $libro['paginas'];
        $txtGenero = $libro['genero'];
        $txtAnio = $libro['anio'];
        $txtResenia = $libro['reseniaPersonal'];
        $txtDescripcion1 = $libro['detalles'];

        //echo "Precionado boton Seleccionar";
        break;

    case 'Eliminar':
        //no requiere cambios si se agregan columnas en la bd
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($libro["imagen"]) && ($libro["imagen"] != "imagen.jpg")) {
            if (file_exists("../../img/" . $libro["imagen"])) {

                unlink("../../img/" . $libro["imagen"]);
            }

        }

        $sentenciaSQL = $conexion->prepare("DELETE  FROM libros WHERE id =:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'

        //header("Location:productos.php");
        //echo "Precionado boton Borrar";
        break;

    default:
        # code...
        break;
}


$sentenciaSQL = $conexion->prepare("SELECT * FROM libros ORDER BY nombre"); //cambiado para ordena 19 de mayo 2024
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Datos de Libro</h5>
            <form id="1" method="POST" enctype="multipart/form-data">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">ID:</label>
                    <input type="text" required readonly value="<?php echo $txtID; ?>" class="form-control" id="txtID"
                        name="txtID" placeholder="ID" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Tipo de Publicacion:</strong></label>
                    <select class="form-select" aria-label="Default select example" id="txtTipo" name="txtTipo"
                        value="<?php echo $txtTipo; ?>">

                        <option> <?php echo $txtTipo; ?></option>

                        <?php
                        include ('../config/conexion.php');

                        $consulta = "SELECT * FROM tipopublicacion ORDER BY nombreTipo";
                        $ejecutarConsulta = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                        ?>

                        <?php foreach ($ejecutarConsulta as $tipos): ?>

                            <option><?php echo $tipos['nombreTipo'] ?></option>

                        <?php endforeach ?>

                    </select>

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Nombre:</strong></label>
                    <input type="text" required value="<?php echo $txtNombre; ?>" class="form-control" id="txtNombre"
                        name="txtNombre" placeholder="Nombre del Libro" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Editorial:</strong></label>
                    <select class="form-select" aria-label="Default select example" id="txtEditorial"
                        name="txtEditorial" value="<?php echo $txtEditorial; ?>">

                        <option> <?php echo $txtEditorial; ?></option>

                        <?php
                        include ('../config/conexion.php');

                        $consulta = "SELECT * FROM editorial ORDER BY nombreEditorial";
                        $ejecutarConsulta = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                        ?>

                        <?php foreach ($ejecutarConsulta as $editoriales): ?>

                            <option><?php echo $editoriales['nombreEditorial'] ?></option>

                        <?php endforeach ?>

                    </select>

                </div>

                <!-- Este es un comentario en HTML 
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Editorial:</strong></label>
                    <input type="text" required value="<?php echo $txtEditorial; ?>" class="form-control"
                        id="txtEditorial" name="txtEditorial" placeholder="Editorial" />
                </div>
                -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Autor:</strong></label>
                    <select class="form-select" aria-label="Default select example" id="txtAutor" name="txtAutor"
                        value="<?php echo $txtAutor; ?>">

                        <option> <?php echo $txtAutor; ?></option>

                        <?php
                        include ('../config/conexion.php');

                        $consulta = "SELECT * FROM autores ORDER BY nombreAutor";
                        $ejecutarConsulta = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                        ?>

                        <?php foreach ($ejecutarConsulta as $autores): ?>

                            <option><?php echo $autores['nombreAutor'] ?></option>

                        <?php endforeach ?>

                    </select>

                </div>

                <!-- Este es un comentario en HTML 
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Autor:</strong></label>
                    <input type="text" required value="<?php echo $txtAutor; ?>" class="form-control" id="txtAutor"
                        name="txtAutor" placeholder="Autor" />
                </div>
                -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>ISBN:</strong></label>
                    <input type="text" value="<?php echo $txtisbn; ?>" class="form-control" id="txtisbn" name="txtisbn"
                        placeholder="ISBN" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Paginas:</strong></label>
                    <input type="text" required value="<?php echo $txtPaginas; ?>" class="form-control" id="txtPaginas"
                        name="txtPaginas" placeholder="Paginas" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="genero"><strong>Genero:</strong></label>
                    <select class="form-select" aria-label="Default select example" id="txtGenero" name="txtGenero"
                        value="<?php echo $txtGenero; ?>">

                        <option> <?php echo $txtGenero; ?></option>

                        <?php
                        include ('../config/conexion.php');

                        $consulta = "SELECT * FROM genero ORDER BY nombregenero";
                        $ejecutarConsulta = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                        ?>

                        <?php foreach ($ejecutarConsulta as $generos): ?>

                            <option><?php echo $generos['nombregenero'] ?></option>

                        <?php endforeach ?>

                    </select>

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="anio"><strong>Año:</strong></label>
                    <input type="text" value="<?php echo $txtAnio; ?>" class="form-control" id="txtAnio" name="txtAnio"
                        placeholder="Año" />
                </div>


                <!--
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Descripcion:</strong></label>
                    <input type="text" value="<?php echo $txtDescripcion; ?>" class="form-control" id="txtDescripcion"
                        name="txtDescripcion" placeholder="Descripcion" />
                </div>
                -->
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><strong>Descripcion:</strong></label>
                    <textarea form="1" class="form-control" id="txtDescripcion1" rows="3" name="txtDescripcion1"
                        placeholder="Descripcion"><?php if (isset($_POST['accion'])) {
                            echo $libro['detalles'];
                        } ?></textarea>
                </div>

                <div class="form-group">
                    <label for="reseniaPersonal"><strong>Reseña Personal:</strong></label>
                    <textarea form="1" class="form-control" id="txtResenia" rows="3" name="txtResenia"
                        placeholder="Reseña Personal"><?php if (isset($_POST['accion'])) {
                            echo $libro['reseniaPersonal'];
                        } ?></textarea>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Img:</strong></label>

                    <?php echo $txtImagen; ?>
                    <br />
                    <?php if ($txtImagen != "") { ?>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" alt="" width="100">
                        <br />
                    <?php } ?>
                    <br />
                    <input type="file" class="form-control" id="txtImagen" name="txtImagen"
                        placeholder="Imagen del Libro" />
                </div>

                <div class="d-grid gap-1 col-6" role="group" aria-label="Button group name">
                    <button type="submit" class="btn btn-success btn-lg" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar">
                        Agregar
                    </button>
                    <button type="submit" class="btn btn-warning btn-lg" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar">
                        Modificar
                    </button>
                    <button type="submit" class="btn btn-info btn-lg" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tabla de Libros</h5>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>

                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaLibros as $libro) { ?>
                            <tr class="">

                                <td><?php echo $libro['nombre']; ?></td>

                                <td>
                                    <img class="img-thumbnail rounded" src="../../img/<?php echo $libro['imagen']; ?>"
                                        alt="" width="85">
                                </td>

                                <td>

                                    <form method="post">
                                        <div class="d-grid gap-1 col-4" role="group" aria-label="Button group name">
                                            <input type="hidden" name="txtID" id="txtID"
                                                value="<?php echo $libro['id']; ?>" />
                                            <input type="submit" name="accion" value="Seleccionar"
                                                class="btn btn-primary" />
                                            <input type="submit" name="accion" value="Eliminar" class="btn btn-danger" />
                                        </div>
                                    </form>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include ('../template/pie.php'); ?>