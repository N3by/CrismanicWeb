<?php include("../template/cabecera.php"); ?> 
<?php

$userID = (isset($_POST['userID']))?$_POST['userID']:"";// condicion ternaria la codicion, si se cumple y lo sucese di no se cumple
$userIdentidad = (isset($_POST['userIdentidad']))?$_POST['userIdentidad']:"";// si se cumple, pues vale, me asignas el nombre que te llegó a la variable $variable
$userIdentidadKind = (isset($_POST['userIdentidadKind']))?$_POST['userIdentidadKind']:"";
$userNombre1 = (isset($_POST['userNombre1']))?$_POST['userNombre1']:"";
$userNombre2 = (isset($_POST['userNombre2']))?$_POST['userNombre2']:"";
$userApellido1 = (isset($_POST['userApellido1']))?$_POST['userApellido1']:"";
$userApellido2 = (isset($_POST['userApellido2']))?$_POST['userApellido2']:"";
$userMail = (isset($_POST['userMail']))?$_POST['userMail']:"";
$userCel = (isset($_POST['userCel']))?$_POST['userCel']:"";
$userDirr = (isset($_POST['userDirr']))?$_POST['userDirr']:"";
$userPais = (isset($_POST['userPais']))?$_POST['userPais']:"";
$userCity = (isset($_POST['userCity']))?$_POST['userCity']:"";
$userRank = (isset($_POST['userRank']))?$_POST['userRank']:"";
$userPlazo = (isset($_POST['userPlazo']))?$_POST['userPlazo']:"";
$userPassw = (isset($_POST['userPassw']))?$_POST['userPassw']:"";
$userPasswVery = (isset($_POST['userPasswVery']))?$_POST['userPasswVery']:"";
$accionado = (isset($_POST['accionado']))?$_POST['accionado']:"";


        // echo $userID."<br/>";
        // echo $userName."<br/>";
        // echo $userPassw."<br/>";
        // echo $userCity."<br/>";
        // echo $accionado."<br/>";




include("../config/bd.php");

switch($accionado){

  case "agregar":

    //INSERT INTO `usuarios` (`id`, `user`, `pass`, `pais`) VALUES (NULL, 'Pedrito', 'arroz', 'Bogota');

    //INSERT INTO usuarios (user_identidad, user_identidad_kind, user_nombre1, user_nombre2, user_apellido1, user_apellido2, user_mail, user_cel, user_dirr, user_pais, user_city, user_rank, user_plazo, user_pass, user_pass_very)
    // VALUES (:userEnty, :userEntyKind, :userN1, :userN2, :userL1, :userL2, :userMail, :userC, :userDirec, :userPai, :userCit, :userRan, :userPla, :userPass, :userPassVer)
   //$sentenciaSQL = $conexion->prepare("INSERT INTO usuarios (user, pass, pais) VALUES(:usuario, :passwr, :pais);");
    $sentenciaSQL = $conexion->prepare("INSERT INTO usuarios (user_identidad, user_identidad_kind, user_nombre1, user_nombre2, user_apellido1, user_apellido2, user_mail, user_cel, user_dirr, user_pais, user_city, user_rank, user_plazo, user_pass, user_pass_very) VALUES(:userEnty, :userEntyKind, :userN1, :userN2, :userL1, :userL2, :userMail, :userC, :userDirec, :userPai, :userCit, :userRan, :userPla, :userPass, :userPassVer);");
    $sentenciaSQL->bindParam(":userEnty",$userIdentidad);
    $sentenciaSQL->bindParam(":userEntyKind",$userIdentidadKind);
    $sentenciaSQL->bindParam(":userN1",$userNombre1);
    $sentenciaSQL->bindParam(":userN2",$userNombre2);
    $sentenciaSQL->bindParam(":userL1",$userApellido1);
    $sentenciaSQL->bindParam(":userL2",$userApellido2);
    $sentenciaSQL->bindParam(":userMail",$userMail);
    $sentenciaSQL->bindParam(":userC",$userCel);
    $sentenciaSQL->bindParam(":userDirec",$userDirr);
    $sentenciaSQL->bindParam(":userPai",$userPais);
    $sentenciaSQL->bindParam(":userCit",$userCity);
    $sentenciaSQL->bindParam(":userRan",$userRank);
    $sentenciaSQL->bindParam(":userPla",$userPlazo);
    $sentenciaSQL->bindParam(":userPass",$userPassw);
    $sentenciaSQL->bindParam(":userPassVer",$userPasswVery);

    $sentenciaSQL->execute();

    echo '<script> alert("El registro fue exitoso")</script>';

    break;
    
}



$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");//ejecuta intruccion, para seleccionar usuarios
$sentenciaSQL -> execute();//ejecuto instruccion
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC) // Recupera los registros y me permite mostrarlos en esta variable.


?>
<div class="col-md-4">
    
</div>

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
                <label for="userIdentidad">Identicacion Usuario</label>
                <input type="text" class="form-control" Required name = "userIdentidad" id="userIdentidad" placeholder="Identificacion ">
                </div>

                <div class="form-group">
                  <label for="userIdentidadKind">Tipo identificacion</label>
                  <select class="form-control" Required name="userIdentidadKind" id="userIdentidadKind">
                    <option>CC</option>
                    <option>TI</option>
                    <option>Pasaporte</option>
                  </select>
                </div>

                <div class="form-group">
                <label for="userNombre1">Primer Nombre</label>
                <input type="text" class="form-control" Required name = "userNombre1" id="userNombre1" placeholder="Primer nombre">
                </div>

                <div class="form-group">
                <label for="userNombre2">Segundo Nombre</label>
                <input type="text" class="form-control" Required name = "userNombre2" id="userNombre2" placeholder="Segundo nombre">
                </div>

                <div class="form-group">
                <label for="userApellido1">Primer Apellido</label>
                <input type="text" class="form-control" Required name = "userApellido1" id="userApellido1" placeholder="Primer Apellido">
                </div>

                <div class="form-group">
                <label for="userApellido2">Segundo Apellido</label>
                <input type="text" class="form-control" Required name = "userApellido2" id="userApellido2" placeholder="Segundo Apellido">
                </div>

                <div class="form-group">
                <label for="userMail">Correo Usuario</label>
                <input type="email" class="form-control" Required name = "userMail" id="userMail" placeholder="Correo Electronico">
                </div>

                
                <div class="form-group">
                <label for="userCel">Numero Celular</label>
                <input type="text" class="form-control" Required name = "userCel" id="userCel" placeholder="Numero celular">
                </div>

                <div class="form-group">
                <label for="userDirr">Direccion residencia</label>
                <input type="text" class="form-control" Required name = "userDirr" id="userDirr" placeholder="Direccion residencia">
                </div>

                <div class="form-group">
                <label for="userPais">Pais de origen</label>
                <input type="text" class="form-control" Required name = "userPais" id="userPais" placeholder="Pais de origen">
                </div>
                
                <div class="form-group">
                <label for="userCity">Ciudad de origen</label>
                <input type="text" class="form-control" Required name = "userCity" id="userCity" placeholder="ciudad de origen">
                </div>


                <div class="form-group">
                  <label for="userRank">Tipo de Usuario</label>
                  <select class="form-control" Required name="userRank" id="userRank">
                    <option>Aprendiz</option>
                    <option>Aficionado</option>
                    <option>Experimentado</option>
                    <option>Maestro</option>
                    <option>VIP</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="userPlazo">Cantidad de plazos</label>
                  <select class="form-control" Required name="userPlazo" id="userPlazo">
                    <option>1 Plazo</option>
                    <option>3 Plazos</option>
                    <option>6 Plazos</option>
                    <option>12 Plazos</option>
                  </select>
                </div>

                <div class="form-group">
                <label for="userPassw">Contraseña</label>
                <input type="password" class="form-control" name = "userPassw" id="userPassw" placeholder="Contraseña ">
                </div>

                <div class="form-group">
                <label for="userPasswVery">Contraseña</label>
                <input type="password" class="form-control" name = "userPasswVery" id="userPasswVery" placeholder="Repita su contraseña ">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name = "accionado" value = "agregar" class="btn btn-success">Registrar Usuario</button>
                </div>
            </form>
        </div>

    </div>
</div>






<?php include("../template/pie.php"); ?>