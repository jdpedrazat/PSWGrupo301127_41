<!DOCTYPE html>
<html lang="es">
<head>
  <title>Insertar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

 <?php

require('../../Administrador/config.php');
// Crear connection
$conexion = new mysqli($servidor, $nombreusuario, $password, $dbnombre);

$id = $_POST['id'];
$barcode = $_POST['barcode'];
$nombre = $_POST['nombre'];
$fechacompra = $_POST['fechacompra'];
$valorcompra = $_POST['valorcompra'];
$ganancia = $_POST['ganancia'];
$cantidad = $_POST['cantidad'];
$proveedor = $_POST['proveedor'];
$origen = $_POST['origen'];
$descripcion = $_POST['descripcion'];

$sql = "UPDATE productos
        SET codigobarras = $barcode, nombre='$nombre', fechaalta='$fechacompra', valorneto='$valorcompra',
            ganancia = '$ganancia', cantidad = '$cantidad', proveedor = '$proveedor', origen = '$origen',
            descripcion = '$descripcion'
        WHERE id='$id'";

if (mysqli_query($conexion, $sql)) {


?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Excelente</h4>
          <button class="close" onclick="location.href='../editar.php'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
        echo "Información actualizada satisfactoriamente " . "<br>";
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../editar.php'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


} else {


?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='../editar.php'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
        echo "Error actualizando la información " . "<br>". mysqli_error($conn);
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../editar.php'">Cerrar</button>
        </div>
        
      </div>
    </div>

 <?php

}

mysqli_close($conn);
?> 