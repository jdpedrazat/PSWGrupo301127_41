<?php
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "12345678";
    $database = "bdunad301127_14";
    
    // Crear connection
    $conexion = new mysqli($servidor, $nombreusuario, $password, $database);

    // Check connection
    if ($conexion->connect_error){
        die("Error de conexión al Servidor: " . $conexion->connect_error);
    }
    
    //Crear Tabla
    $sql = "CREATE DATABASE bdunad301127_14";
    if($conexion->query($sql) === true){
        echo "Base de datos creada satisfactoriamente...";
    }else{
        die("Error al Crear Base de Datos" . $conexion->error);
    }
    //cerrar conexión
    mysqli_close($conexion);
?>