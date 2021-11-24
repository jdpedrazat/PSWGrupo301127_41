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

$barcode = $_GET['barcode'];
$nombre = $_GET['nombre'];

if (!empty($barcode)){
  if (!empty($nombre)){
    $sql = "SELECT * FROM productos WHERE nombre like '%$nombre%' or codigobarras = '$barcode'";
  }else{
    $sql = "SELECT * FROM productos WHERE codigobarras = '$barcode'";
  }
}elseif (!empty($nombre)){
    $sql = "SELECT * FROM productos WHERE nombre like '%$nombre%'";
}

$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Datos</h4>
          <button class="close" onclick="location.href='../editar.php'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <?php
            echo "ID: " . $row["id"]
            . "<br> Codigo de Barras: " . $row["codigobarras"]
            . "<br> Nombre: " . $row["nombre"]
            . "<br> Proveedor: ". $row["proveedor"]
            . "<br> Origen: ". $row["origen"]
            . "". "<br>";
        ?>
        </div>
        
        <!-- Modal footer 
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../editar.html'">Cerrar</button>
        </div>-->
        <div class="modal-footer">
          <form action="../editar.php" class="d-flex" method="post">
            <input id="barcode" name="id" type="hidden" class="form-control" value = <?php echo $row["id"]; ?>><p></p>
            <input id="barcode" name="barcode" type="hidden" class="form-control" value = <?php echo $row["codigobarras"]; ?>><p></p>
            <input id="nombreproducto" name="nombreproducto" type="hidden" class="form-control" value = <?php echo $row["nombre"]; ?>><p></p>
            <input id="fechacompra" name="fechacompra" type="hidden" class="form-control" value = <?php echo $row["fechaalta"]; ?>><p></p>
            <input id="valorcompra" name="valorcompra" type="hidden" class="form-control" value = <?php echo $row["valorneto"]; ?>><p></p>
            <input id="ganancia" name="ganancia" type="hidden" class="form-control" value = <?php echo $row["ganancia"]; ?>><p></p>
            <input id="cantidad" name="cantidad" type="hidden" class="form-control" value = <?php echo $row["cantidad"]; ?>><p></p>
            <input id="Proveedor" name="proveedor" type="hidden" class="form-control" value = <?php echo $row["proveedor"]; ?>><p></p>
            <input id="origen" name="origen" type="hidden" class="form-control" value = <?php echo $row["origen"]; ?>><p></p>
            <input id="descripcion" name="descripcion" type="hidden" class="form-control" value = <?php echo $row["descripcion"]; ?>><p></p>
            <button class="btn btn-outline-primary" type="submit">Actualizar</button>
          </form>
        </div>
        
      </div>
    </div>



 <?php
        
//$myJSON = json_encode($row);

//echo $myJSON;
    }

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
            echo "No existen productos, verifique los parámetros de búsqueda" . "<br>";
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
mysqli_close($conexion);
?>