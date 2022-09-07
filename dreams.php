<?php include ("template/cabecera.php")?>

<?php 
include("admin/config/bd.php"); // conectar a base de datos

 // consulta para traer la informacion de todas las obras disponibles

$sentenciaSQL = $conexion->prepare("SELECT * FROM obras");
$sentenciaSQL ->execute();
$listaObras = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); //ejecuta sql, aplica metodo fetch_all, (recupera todos los registros), fetch asocia datos tabla y nuevos registros.


?>
<?php foreach($listaObras as $Sobra) {?>

    <div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $Sobra['imagen'];?>" alt="">

        <div class="card-body">
            <h4 class="card-title"><?php echo $Sobra['nombre'];?></h4>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Ver más</a>
        </div>
    </div>
</div>


<?php }?>




<?php include("template/pie.php")?>