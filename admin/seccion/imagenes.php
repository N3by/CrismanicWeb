<?php include("../template/cabecera.php"); ?>
<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:""; // condicion ternaria la codicion, si se cumple y lo sucese di no se cumple
$txtNombre =(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$fileImage =(isset($_FILES['fileImage']['name']))?$_FILES['fileImage']['name']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

/* 
    echo $txtID."<br/ >";
    echo $txtNombre."<br/>";
    echo $fileImage."<br/>";
    echo $accion."<br/>";
    verifica que la informacion llega
*/


include("../config/bd.php");

switch($accion){

    case"Agregar":
//esto será util para crear la "administracion de usuario -> aplicarlo allí."
        $sentenciaSQL = $conexion->prepare("INSERT INTO obras (nombre, imagen) VALUES (:nombre, :imagen );"); //:nombre y :imagen hacen referencia a los parametros de la linea "bindParam"
        $sentenciaSQL ->bindParam(":nombre", $txtNombre); //aqui se especifica cual es el parametro a remplazar, los de arriba
        $sentenciaSQL ->bindParam(":imagen", $fileImage); //aqui se especifica cual es el parametro a remplazar, los de arriba, //para insertar en base de datos, los datos que el usuario ingresó
        $sentenciaSQL -> execute();
        break;

}
switch($accion){

    case"Modificar":
        echo "Presionado boton Modificar";
        break;
}

switch($accion){

    case"Cancelar":
        echo "Presionado botón Cancelar";
        break;
}
switch($accion){

    case("Seleccionar"):{
        echo "Presionado botón Seleccionar";

        $sentenciaSQL = $conexion->prepare("SELECT * FROM obras WHERE id = :id");
        $sentenciaSQL ->bindParam(':id', $txtID);
        $sentenciaSQL ->execute();
        $ObraMaster = $sentenciaSQL->fetch(PDO::FETCH_LAZY); //ejecuta sql, aplica metodo fetch_all, (recupera todos los registros), fetch asocia datos tabla y nuevos registros.
                                                            //el lazy hace que lo pueda cargar uno a uno
        $txtNombre = $ObraMaster['nombre'];
        $fileImage = $ObraMaster['imagen']; // agrega valur a la linea de codigo 86 y similares, relacionados a value
    }
}
switch($accion){

    case("Borrar"):{

        $sentenciaSQL = $conexion->prepare("DELETE FROM obras WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        //echo "Presionado botón Borrar";
    }
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM obras");
$sentenciaSQL ->execute();
$listaObras = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); //ejecuta sql, aplica metodo fetch_all, (recupera todos los registros), fetch asocia datos tabla y nuevos registros.

?>
<div class="col-md-4"> 

    <div class="card">
        <div class="card-header">
            Datos de imagenes
        </div>
        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data"> <!-- -->
            <div class = "form-group">
                <label for = "txtID">Id de imagen: </label>
                <input type="text" class="form-control" value = "<?php echo $txtID; ?>" name ="txtID" id = "txtID" placeholder="🆔ID">
            </div>

            <div class = "form-group">
                <label for = "txtNombre">Nombre: </label>
                <input type="text" class="form-control" value = "<?php echo $txtNombre; ?>" name ="txtNombre" id = "txtNombre" placeholder="🖼Nombre">
            </div>

            <div class = "form-group">
                <label for = "fileImage">Imagen: </label>

                <?php echo $fileImage; ?>

                <input type="file" class="form-control" name ="fileImage" id = "fileImage" placeholder="🗃Imagen">
            </div>

            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name = "accion" value="Agregar" class="btn btn-success">Agregar</button>
                <button type="submit" name = "accion" value="Modificar"class="btn btn-warning">Modificar</button>
                <button type="submit" name = "accion" value="Cancelar"class="btn btn-info">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="col-md-8">
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
            <?php foreach($listaObras as $obra){ ?>

            <tr>
                <td><?php echo $obra['id'];//estos datos deben coincidir con bd?></td> 
                <td><?php echo $obra['nombre'];?>
                <td><?php echo $obra['imagen'];?>


                <td>
                    <form method="POST">

                        <input type="hidden" name="txtID" value="<?php echo $obra['id']?>"/>    

                        <input type="submit" name = "accion" value="Seleccionar" class="btn btn-primary"/>

                        <input type="submit" name = "accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>