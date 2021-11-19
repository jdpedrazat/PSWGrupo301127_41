<?php
    require('config.php');
    
    // Crear connection
    $conexion = new mysqli($servidor, $nombreusuario, $password, $dbnombre);
    echo "<a href='../index.html' text-aling='center'> Volver</a>";
    echo "<br>";
    // Check connection
    if ($conexion->connect_error){
        die("Error de conexión al Servidor: " . $conexion->connect_error);
        echo "<a href='../index.html'> Volver</a>";
    }

    //Crear Tabla
    $sql = "CREATE TABLE productos (
        id SMALLINT auto_increment PRIMARY KEY,
        codigobarras VARCHAR(40),
        nombre VARCHAR(60) NOT NULL,
        fechaalta TIMESTAMP,
        valorneto DOUBLE,
        ganancia FLOAT,
        cantidad int,
        proveedor SMALLINT,
        descripcion BLOB)
        ";
    if($conexion->query($sql) === true){
        echo "Tabla creada satisfactoriamente...";
    }else{
        die("Error al Tabla en la Base de Datos" . $conexion->error);
    }
    //cerrar conexión
    mysqli_close($conexion);
    
?>