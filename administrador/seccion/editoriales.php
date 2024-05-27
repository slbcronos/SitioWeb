<?php include ('../template/cabecera.php'); ?>

<div class="col-md-5      ">


    <div class="card">
        <div class="card-header">Datos de la Editorial</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editorial</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Nombre de la Editorial">
                </div>
                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="button" class="btn btn-success btn-lg">
                        Agregar
                    </button>
                    <button type="button" class="btn btn-warning btn-lg">
                        Modificar
                    </button>
                    <button type="button" class="btn btn-info btn-lg">
                        Cancelar
                    </button>
                </div>


            </form>
        </div>
    </div>
    <br/>


</div>




<div class="col-md-7      ">
    <div class="card">
        <div class="card-header">Editoriales</div>
        <div class="card-body">

        </div>
    </div>

</div>







<?php include ('../template/pie.php'); ?>