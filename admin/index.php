<?php

if($_POST){ //si hay un envio tipo post, has esto

    header('Location:inicio.php');

}

?>

<!doctype html>
<html lang="es">
  <head>
    <title>Login</title>
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
                        Login 
                    </div>
                    <div class="card-body">
                        <form method="POST">
                        <div class = "form-group">
                        <label>Usuario: </label>
                        <input type="text" class="form-control" name = "usuario" aria-describedby="emailHelp" placeholder="👤Ingresa nombre de usuario">
                        </div>

                        <div class="form-group">
                        <label>Constraseña:</label>
                        <input type="password" class="form-control" name = "contrasenia" placeholder="🔑Contraseña">
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