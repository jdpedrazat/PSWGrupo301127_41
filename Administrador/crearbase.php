<!DOCTYPE html>
<html lang="es">
<head>
  <title>Crear Tabla</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php
require('config.php');

// Crear connection
$conexion = new mysqli($servidor, $nombreusuario, $password);
?>

<!--The Modal-->
<div class="modal-dialog">
    <div class="modal-content">
        <!--Modal Content-->
        <div class="modal-header">
            <h4 class="modal-title">Información</h4>
            <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>

        <!--Modal Content-->
        <div class="modal-body">
            <?php
            // Check connection
            if ($conexion->connect_error){
                die("Error de conexión al Servidor: " . $conexion->connect_error);
            }
            
            //Crear Base de Datos
            $sql = "CREATE DATABASE bdunad301127_14";
            if($conexion->query($sql) === true){
                echo "Base de datos creada satisfactoriamente...";
            }else{
                die("Error al Crear Base de Datos: " . $conexion->error);
            }
            //cerrar conexión
            mysqli_close($conexion);
            ?>
        </div>
        
        <!--Modal footer-->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../index.html'">Cerrar</button>
        </div>
    </div>

</div>
</body>
</html>
