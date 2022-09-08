<?php include("../template/cabecera.php"); ?>
<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:""; // condicion ternaria la codicion, si se cumple y lo sucese di no se cumple
$txtNombre =(isset($_POST['txtNombre']))?$_POST['txtNombre']:""; // si se cumple, pues vale, me asignas el nombre que te llegó a la variable $variable
$fileImage =(isset($_FILES['fileImage']['name']))?$_FILES['fileImage']['name']:"";

//arriba es el lugar perfecto para verificar que se ingresó la informacion correcta. / validar

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
        //modificar y subir imagenes
        $fecha = new DateTime();//evitara duplicacidad utilizando fecha / hora en que se sube archivo
        $nombreArchivo = ($fileImage!="")?$fecha->getTimestamp()."_".$_FILES["fileImage"]["name"]:"imagen.jpg"; //validar que el nombre no este vacio
        
        $tmpImagen = $_FILES["fileImage"]["tmp_name"];

        if($tmpImagen!=""){
            //el punto sirve para concatenar
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo); // mover archivo instrucción. el [$ , "ruta a donde la mueve"]
        }
        $sentenciaSQL ->bindParam(":imagen", $nombreArchivo); //aqui se especifica cual es el parametro a remplazar, los de arriba, //para insertar en base de datos, los datos que el usuario ingresó
        $sentenciaSQL -> execute();

        header("Location:imagenes.php");
        break;

}
switch($accion){

    case"Modificar":

        $sentenciaSQL = $conexion->prepare("UPDATE obras SET nombre = :nombre WHERE id = :id");
        $sentenciaSQL ->bindParam(':nombre', $txtNombre);
        $sentenciaSQL ->bindParam(':id', $txtID);

        $sentenciaSQL ->execute();


        // echo "Presionado boton Modificar";

        //condicional para que el campo de la imagen no sea vacio.
        if($fileImage!=""){

            //esto es literalmente el codigo que utilice arriba para adjuntar imagenes y evitar duplicidad de nombres
            $fecha = new DateTime();//evitara duplicacidad utilizando fecha / hora en que se sube archivo
            $nombreArchivo = ($fileImage!="")?$fecha->getTimestamp()."_".$_FILES["fileImage"]["name"]:"imagen.jpg"; //validar que el nombre no este vacio
            $tmpImagen = $_FILES["fileImage"]["tmp_name"];
            
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo); // mover archivo instrucción. el [$ , "ruta a donde la mueve"]
            //ahora utilizo el mismo mismo codigo que utilicé abajo para eliminar una imagen, verificando que el nombre sea exacatamente el mismo.
            
            //busca fotografia y la borra ->
            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM obras WHERE id = :id"); // obtener nombre de la imagen
            $sentenciaSQL ->bindParam(':id', $txtID);
            $sentenciaSQL ->execute();
            $ObraMaster = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
            

            //verificar que no se tenga la misma imagen, exite? y si si existe, es diferente? 
            if(isset($ObraMaster["imagen"]) && ($ObraMaster["imagen"]!="imagen.jpg")) { //si esa imagen existe

                if(file_exists("../../img/".$ObraMaster["imagen"])){

                    unlink("../../img/".$ObraMaster["imagen"]); // unlink borra la imagen.
                }
            }

            //actualiza con nuevo nombre
            $sentenciaSQL = $conexion->prepare("UPDATE obras SET imagen = :imagen WHERE id = :id");
            $sentenciaSQL ->bindParam(':imagen', $nombreArchivo);  //acutaliza nombre
            $sentenciaSQL ->bindParam(':id', $txtID);
            $sentenciaSQL ->execute();
        }
        
        header("Location:imagenes.php");

        break;
}

switch($accion){

    case"Cancelar":
        // echo "Presionado botón Cancelar";

        header("Location:imagenes.php");
        break;
}
switch($accion){

    case("Seleccionar"):{

        $sentenciaSQL = $conexion->prepare("SELECT * FROM obras WHERE id = :id");
        $sentenciaSQL ->bindParam(':id', $txtID);
        $sentenciaSQL ->execute();
        $ObraMaster = $sentenciaSQL->fetch(PDO::FETCH_LAZY); //ejecuta sql, aplica metodo fetch_all, (recupera todos los registros), fetch asocia datos tabla y nuevos registros.
                                                            //el lazy hace que lo pueda cargar uno a uno
        $txtNombre = $ObraMaster['nombre'];
        $fileImage = $ObraMaster['imagen']; // agrega valur a la linea de codigo 86 y similares, relacionados a value
        //echo "Presionado botón Seleccionar";
        break;
    }
}
switch($accion){

    case("Borrar"):{
    
        //para borrar imagenes

        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM obras WHERE id = :id"); // obtener nombre de la imagen
        $sentenciaSQL ->bindParam(':id', $txtID);
        $sentenciaSQL ->execute();
        $ObraMaster = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        //verificar que no se tenga la misma imagen, exite? y si si existe, es diferente? 
        if(isset($ObraMaster["imagen"]) && ($ObraMaster["imagen"]!="imagen.jpg")) { //si esa imagen existe

            if(file_exists("../../img/".$ObraMaster["imagen"])){

                unlink("../../img/".$ObraMaster["imagen"]); // unlink borra la imagen.
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM obras WHERE id = :id"); // esto es para mostrar/ traer los valores actuales y enviarselos a la parte de abajo (los td)
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
       // echo "Presionado botón Borrar";

       header("Location:imagenes.php");
        break;
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
                <input type="text" required readonly class="form-control" value = "<?php echo $txtID; ?>" name ="txtID" id = "txtID" placeholder="🆔ID">
            </div>

            <div class = "form-group">
                <label for = "txtNombre">Nombre: *</label>
                <input type="text" required class="form-control" value = "<?php echo $txtNombre; ?>" name ="txtNombre" id = "txtNombre" placeholder="🖼Nombre">
            </div>

            <div class = "form-group">
                <label for = "fileImage">Imagen: *</label>
                <br>

                <?php echo $fileImage; ?>

                <?php if($fileImage!=""){   ?>

                    <img class = "img-thumbnail rounded" src="../../img/<?php echo $fileImage;?>" width="100px" alt="" srcset="">
                    
                <?php   }   ?>

                <input type="file" class="form-control" name ="fileImage" id = "fileImage" placeholder="🗃Imagen">
            </div>

            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name = "accion" <?php echo($accion == "Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                <button type="submit" name = "accion" <?php echo($accion != "Seleccionar")?"disabled":""; ?> value="Modificar"class="btn btn-warning">Modificar</button>
                <button type="submit" name = "accion" <?php echo($accion != "Seleccionar")?"disabled":""; ?> value="Cancelar"class="btn btn-info">Cancelar</button>
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
                <td><img class = "img-thumbnail rounded" src="../../img/<?php echo $obra['imagen'];?>" width="100px" alt="" srcset="">




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