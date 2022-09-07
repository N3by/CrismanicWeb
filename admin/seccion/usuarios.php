<?php include("../template/cabecera.php"); ?>
<?php

$userID = (isset($_POST['userID']))?$_POST['userID']:"";// condicion ternaria la codicion, si se cumple y lo sucese di no se cumple
$userName = (isset($_POST['userName']))?$_POST['userName']:"";// si se cumple, pues vale, me asignas el nombre que te llegó a la variable $variable
$userPassw = (isset($_POST['userPassw']))?$_POST['userPassw']:"";
$userCity = (isset($_POST['userCity']))?$_POST['userCity']:"";
$accionado = (isset($_POST['accionado']))?$_POST['accionado']:"";


        echo $userID."<br/>";
        echo $userName."<br/>";
        echo $userPassw."<br/>";
        echo $userCity."<br/>";
        echo $accionado."<br/>";




include("../config/bd.php");

switch($accionado){

    case "agregar":

        //INSERT INTO `usuarios` (`id`, `user`, `pass`, `pais`) VALUES (NULL, 'Pedrito', 'arroz', 'Bogota');
        $sentenciaSQL = $conexion->prepare("INSERT INTO usuarios (user, pass, pais) VALUES(:usuario, :passwr, :pais);");
        $sentenciaSQL->bindParam(":usuario",$userName);
        $sentenciaSQL->bindParam(":passwr",$userPassw);
        $sentenciaSQL->bindParam(":pais",$userCity);
        $sentenciaSQL->execute();

        echo "Presionado boton agregar";
        break;

    case "modificar":
        echo "Presionado boton Modificar";
        break;

    case "cancelar":
            echo "Presionado boton Cancelar";
            break;

}

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");//ejecuta intruccion, para seleccionar usuarios
$sentenciaSQL -> execute();//ejecuto instruccion
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC) // Recupera los registros y me permite mostrarlos en esta variable.


?>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Registro de Usuario: 
        </div>
        <div class="card-body">

            <form method="POST">

                <div class = "form-group">
                <label for="userID">ID</label>
                <input type="text" class="form-control" name = "userID" id="UserID" placeholder="ID ">
                </div>

                <div class="form-group">
                <label for="userName">Usename</label>
                <input type="text" class="form-control" name = "userName" id="userName" placeholder="Nombre de usuario ">
                </div>

                <div class="form-group">
                <label for="userPassw">Contraseña</label>
                <input type="password" class="form-control" name = "userPassw" id="userPassw" placeholder="Contraseña ">
                </div>

                <div class="form-group">
                  <label for="userCity">Ciudad de origen</label>
                  <select class="form-control" name="userCity" id="">
                    <option>Colombia</option>
                    <option>Chile</option>
                    <option>Argentina</option>
                    <option>Mexico</option>
                  </select>
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name = "accionado" value = "agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name = "accionado" value = "modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name = "accionado" value = "cancelar" class="btn btn-info">Cancelar</button>
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
                <th>Username</th>
                <th>Contraseña</th>
                <th>Pais</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach($listaUsuarios as $usuario)?>
            <tr>
                <td><?php echo $usuario['id']?></td>
                <td><?php echo $usuario['user']?></td> <!-- lo que va dentro del $usuario ['aqui'] debe coincidir con el nombre la columna de la bd -->
                <td><?php echo $usuario['pass']?></td>
                <td><?php echo $usuario['pais']?></td>
                <td>
                    <form method="POST">

                        <input type="hidden" name="txtID" value="<?php echo $usuario['id']?>"/>    

                        <input type="submit" name = "accion" value="Seleccionar" class="btn btn-primary"/>

                        <input type="submit" name = "accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                
                </td>
            </tr>
        </tbody>
    </table>
</div>





<?php include("../template/pie.php"); ?>