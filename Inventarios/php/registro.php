<!DOCTYPE html>
<html lang="es">
<head>
  <title>Insertar</title>
    <title>Insertar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>



 <?php

require('../../Administrador/config.php');
// Crear connection
$conexion = new mysqli($servidor, $nombreusuario, $password, $dbnombre);

//Declarar variables
$barcode = $_POST['barcode'];
$nombre = $_POST['nombreproducto'];
$fecha = $_POST['fechacompra'];
$valor = $_POST['valorcompra'];
$ganancia = $_POST['ganancia'];
$cantidad = $_POST['cantidad'];
$proveedor = $_POST['proveedor'];
$origen = $_POST['origen'];
$descripcion = $_POST['descripcion'];


$sql = "INSERT INTO productos (codigobarras, nombre, fechaalta, valorneto, ganancia, cantidad, proveedor, origen, descripcion) VALUES ('$barcode', '$nombre', '$fecha', '$valor', '$ganancia', '$cantidad', '$proveedor', '$origen', '$descripcion')";


//

if (mysqli_query($conexion, $sql)) {
 
?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Excelente</h4>
          <button class="close" onclick="location.href='../registro.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Datos grabados safisfactoriamente
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../registro.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php
} else 
{

?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='../registro.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
          echo "Error grabando datos: <br>" . $sql . "<br>" . mysqli_error($conexion);
          ?> 

        </div>

        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../registro.html'">Cerrar</button>
        </div>
        
      </div>
    </div>
 <?php

}

mysqli_close($conn);

?> 