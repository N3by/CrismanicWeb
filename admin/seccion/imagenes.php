<?php include("../template/cabecera.php"); ?>
<?php

print_r($_POST);

print_r($_FILES);


?>
<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de imagenes
        </div>
        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data"> <!-- -->
            <div class = "form-group">
                <label for = "txtID">Id de imagen: </label>
                <input type="text" class="form-control" name ="txtID" id = "txtID" placeholder="🆔ID">
            </div>

            <div class = "form-group">
                <label for = "txtNombre">Nombre: </label>
                <input type="text" class="form-control" name ="txtNombre" id = "txtNombre" placeholder="🖼Nombre">
            </div>

            <div class = "form-group">
                <label for = "fileImage">Imagen: </label>
                <input type="file" class="form-control" name ="fileImage" id = "fileImage" placeholder="🗃Imagen">
            </div>

            <div class="btn-group" role="group" aria-label="">
                <button type="button" name = "accion" value="Agregar" class="btn btn-success">Agregar</button>
                <button type="button" name = "accion" value="Modificar"class="btn btn-warning">Modificar</button>
                <button type="button" name = "accion" value="Cancelar"class="btn btn-info">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Panda rojo tierno</td>
                <td>cuteRedPanda.webp</td>
                <td>Seleccionar | Borrar</td>
            </tr>

        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>