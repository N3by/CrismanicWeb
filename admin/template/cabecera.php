<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php $url =" http://".$_SERVER['HTTP_HOST']."/LacteosCrisM"?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#">Administrador del sitio web</a>
          <a class="nav-item nav-link" href="<?php echo $url."/admin/inicio.php"?>">Inicio</a>
          <a class="nav-item nav-link" href="<?php echo $url."/admin/seccion/imagenes.php"?>">Administrador de Imagenes</a>
          <a class="nav-item nav-link" href="<?php echo $url."/admin/seccion/cerrar.php"?>">Cerrar sesión</a>
          <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
      </div>
  </nav>
    <div class="container">
        <br>
        <div class="row">