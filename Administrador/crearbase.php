<?php
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "12345678";

    // Crear connection
    $conexion = new mysqli($servidor, $nombreusuario, $password);

    // Check connection
    if ($conexion->connect_error){
        die("Error de conexión al Servidor: " . $conexion->connect_error);
    }
    
    //Crear Base de Datos
    $sql = "CREATE DATABASE bdunad301127_14";
    if($conexion->query($sql) === true){
        echo "Base de datos creada satisfactoriamente...";
    }else{
        die("Error al Crear Base de Datos" . $conexion->error);
    }
    //cerrar conexión
    mysqli_close($conexion);
?>