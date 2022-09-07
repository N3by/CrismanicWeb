<?php

session_start();

if($_POST){
//valida usuairio y contraseña, esta se cambia a consulta en base de datos.
    if(($_POST['usuario'] == "toor")&&($_POST['contrasenia']=="rootCRA")){ // si lo quiere hacer con la base de datos, este es el lugar para implementar la verificacion en bd


        $_SESSION['usuario'] = "ok"; //la cosa usuario es una variable y se le asigna un valor// de este modo le asigna valor a la "Funcion session."
        $_SESSION['nombreUsuario'] = "Toor";
        echo $_SESSION['usuario'];
        header('Location:inicio.php');
    }else{

        $mensaje="Error: el usuario o contraseña son incorrectos";
    }
}
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Login de administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- "../css/bootstrap.min.css" -->
  </head>
  <body>
    <div class="container"> 
        <div class="row">

        <div class="col-md-4">
            
        </div>
            <div class="col-md-4">
                <br><br><br><br><br><br><br><br><br>
                <div class="card">
                    <div class="card-header">
                        Login de administrador
                    </div>
                    <div class="card-body">
                        <?php if(isset($mensaje)){ ?>

                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje;?>
                            </div>

                            <?php echo "pelelo en reversaa gononea" ;?>
                        <?php }?>
                    
                        <form method="POST">
                        <div class = "form-group">
                        <label>Usuario: </label>
                        <input type="text" class="form-control" name = 'usuario' aria-describedby="emailHelp" placeholder="👤Ingresa nombre de usuario">
                        </div>

                        <div class="form-group">
                        <label>Constraseña:</label>
                        <input type="password" class="form-control" name = 'contrasenia' placeholder="🔑Contraseña">
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar al admin</button>
                        </form>
                        
                        
                    </div>

                </div>
            </div>
            
        </div>
    </div>
  </body>
</html>