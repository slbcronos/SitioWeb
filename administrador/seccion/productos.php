<?php include ('../template/cabecera.php'); ?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtEditorial = (isset($_POST['txtEditorial'])) ? $_POST['txtEditorial'] : "";
$txtAutor = (isset($_POST['txtAutor'])) ? $_POST['txtAutor'] : "";
$txtisbn = (isset($_POST['txtisbn'])) ? $_POST['txtisbn'] : "";
$txtPaginas = (isset($_POST['txtPaginas'])) ? $_POST['txtPaginas'] : "";
//$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtDescripcion1 = (isset($_POST['txtDescripcion1'])) ? $_POST['txtDescripcion1'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include ('../config/bd.php'); // referencia a Base de Datos

switch ($accion) {
    case 'Agregar':
        // case agregar
        $sentenciaSQL = $conexion->prepare("INSERT INTO libros (nombre,editorial,autor,isbn,paginas,detalles,imagen) VALUES (:nombre,:editorial,:autor,:isbn,:paginas,:detalles,:imagen)");//cambia segun la bd
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':editorial', $txtEditorial);
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->bindParam(':isbn', $txtisbn);
        $sentenciaSQL->bindParam(':paginas', $txtPaginas);
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
        $sentenciaSQL = $conexion->prepare("UPDATE libros SET nombre=:nombre, editorial=:editorial,autor=:autor,isbn=:isbn,paginas=:paginas, detalles=:detalles  WHERE id=:id"); // cambia segun los camops de la bd
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':editorial', $txtEditorial);
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->bindParam(':isbn', $txtisbn);
        $sentenciaSQL->bindParam(':paginas', $txtPaginas);
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

        $txtNombre = $libro['nombre'];
        $txtImagen = $libro['imagen'];
        $txtEditorial = $libro['editorial'];
        $txtAutor = $libro['autor'];
        $txtisbn = $libro['isbn'];
        $txtPaginas = $libro['paginas'];
        //$txtDescripcion = $libro['detalles'];
        $txtDescripcion1 = $libro['detalles'];

        //echo "Precionado boton Seleccionar";
        break;

    case 'Borrar':
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

$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Datos de Libro</h5>
            <form id="1" method="post" enctype="multipart/form-data">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">ID:</label>
                    <input type="text" required readonly value="<?php echo $txtID; ?>" class="form-control" id="txtID"
                        name="txtID" placeholder="ID" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Nombre:</strong></label>
                    <input type="text" required value="<?php echo $txtNombre; ?>" class="form-control" id="txtNombre"
                        name="txtNombre" placeholder="Nombre del Libro" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Editorial:</strong></label>
                    <input type="text" required value="<?php echo $txtEditorial; ?>" class="form-control"
                        id="txtEditorial" name="txtEditorial" placeholder="Editorial" />
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"><strong>Autor:</strong></label>
                    <input type="text" required value="<?php echo $txtAutor; ?>" class="form-control" id="txtAutor"
                        name="txtAutor" placeholder="Autor" />
                </div>

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
                        placeholder="Descripcion"> <?php if (isset($_POST['accion'])) {
                            echo $libro['detalles'];
                        } ?> </textarea>
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

                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" class="btn btn-success" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar">
                        Agregar
                    </button>
                    <button type="submit" class="btn btn-warning" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar">
                        Modificar
                    </button>
                    <button type="submit" class="btn btn-info" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar">
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
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaLibros as $libro) { ?>
                            <tr class="">
                                <td><?php echo $libro['id']; ?></td>
                                <td><?php echo $libro['nombre']; ?></td>

                                <td>
                                    <img class="img-thumbnail rounded" src="../../img/<?php echo $libro['imagen']; ?>"
                                        alt="" width="70">
                                </td>

                                <td>

                                    <form method="post">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id']; ?>" />
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />

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