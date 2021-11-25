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

$sqldelete = "DELETE FROM productos WHERE id = '$id'";

$result = mysqli_query($conexion, $sqldelete);

mysqli_close($conexion);
?>

<!--The Modal-->
<div class="modal-dialog">
    <div class="modal-content">
        <!--Modal Content-->
        <div class="modal-header">
            <h4 class="modal-title">Información</h4>
            <button class="close" onclick="location.href='../editar.php'">&times;</button>
        </div>

        <!--Modal Content-->
        <div class="modal-body">
          Registro borrado satisfactoriamente
        </div>
        
        <!--Modal footer-->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../editar.php'">Cerrar</button>
        </div>
    </div>

</div>
