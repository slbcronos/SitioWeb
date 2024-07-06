<?php include ('../template/cabecera.php'); ?>

<?php

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include ('../config/bd.php'); // referencia a Base de Datos

switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO editorial (nombreEditorial) VALUES (:nombreEditorial)");//cambia segun la bd
        $sentenciaSQL->bindParam(':nombreEditorial', $txtNombre);
        $sentenciaSQL->execute();
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        break;

    case "Modificar":
        //echo "Precionado Boton Modificar";
        $sentenciaSQL = $conexion->prepare("UPDATE editorial SET nombreEditorial=:nombreEditorial  WHERE id=:id"); // cambia segun los camops de la bd
        $sentenciaSQL->bindParam(':nombreEditorial', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        break;

    case "Cancelar":
        //echo "Precionado Boton Cancelar";
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        break;

    case "Seleccionar":
        //echo "Precionado Boton Seleccionar";
        $sentenciaSQL = $conexion->prepare("SELECT * FROM editorial WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $editorial = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre = $editorial['nombreEditorial'];
        break;

    case "Eliminar":
        //echo "Precionado Boton Borrar";
        $sentenciaSQL = $conexion->prepare("DELETE FROM editorial WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        echo ("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
        break;

    default:
        # code...
        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM editorial ORDER BY nombreEditorial");
$sentenciaSQL->execute();
$listaEditoriales = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Este es HTML -->
<div class="col-md-5">

    <div class="card">
        <div class="card-header">Datos de la Editorial</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID</label>
                    <input type="text" required readonly class="form-control" name="txtID" id="txtID" placeholder="ID"
                        value="<?php echo $txtID; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editorial</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre"
                        value="<?php echo $txtNombre; ?>" placeholder="Nombre de la Editorial">
                </div>

                <div class="d-grid gap-1 col-6">
                    <button class="btn btn-success btn-lg" <?php echo ($accion == "Seleccionar") ? "disabled" : "" ?>
                        name="accion" value="Agregar" type="submit">Agregar</button>
                    <button class="btn btn-warning btn-lg" <?php echo ($accion != "Seleccionar") ? "disabled" : "" ?>
                        name="accion" value="Modificar" type="submit">Modificar</button>
                    <button class="btn btn-info btn-lg" <?php echo ($accion != "Seleccionar") ? "disabled" : "" ?> name="accion"
                        value="Cancelar" type="submit">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <br />
</div>

<div class="col-md-7">
    <div class="card">
        <div class="card-header">Tabla de Editoriales</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabla_id">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaEditoriales as $editoriales) { ?>

                            <tr>
                                <td><?php echo $editoriales['id'] ?></td>
                                <td><?php echo $editoriales['nombreEditorial'] ?></td>
                                <td>

                                    <form method="post">
                                        <div class="d-grid gap-1 col-4" role="group" aria-label="Button group name">
                                            <input type="hidden" name="txtID" id="txtID"
                                                value="<?php echo $editoriales['id']; ?>" />
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