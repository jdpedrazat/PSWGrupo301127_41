<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PC Electronics</title>
    
    <style>
      input:invalid {
        border: 1px dashed red;
      }
      input:required{
        border: 1px solid gray;
      }
    </style>

  </head>
  <body>
    
    <h1>PC Electronics</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Inventarios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../Inventarios/registro.html">Registrar</a></li>
                <li><a class="dropdown-item  active" href="#">Editar</a></li>
                <li><a class="dropdown-item" href="../Inventarios/inventario.html">Inventario</a></li>
                <li><a class="dropdown-item" href="../Inventarios/eliminar.html">Eliminar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Utilidades
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../Utilidades/CalcularVenta.html">Calcular Venta</a></li>
                <li><a class="dropdown-item" href="../Utilidades/ConvertirDatos.html">Convertir Equivalencia</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrador</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Administrador/crearbase.php">Crear Base</a></li>
                <li><a class="dropdown-item" href="Administrador/creartablas.php">Crear Tablas</a></li>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- En este formulario se va a editar la información de los productos que estan en la base de datos del inventario -->
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <section class="col-xs-12 col-md-8">
          <h2>Editar Productos</h2>
        <!---Formulario para buscar productos de la base de datos -->
          <form class="d-flex" method="get" action="php/consultar.php" name="busqueda">
            <input name="barcode" class="form-control me-2" type="search" placeholder="Buscar por código de barras " aria-label="Search">
            <input name="nombre" class="form-control me-2" type="search" placeholder="Buscar por nombre del producto " aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
        <!-- En este formulario se va a editar la información de los productos que estan en la base de datos del inventario -->                 
          <form class="d-flex" method="post" action="php/actualizar.php" name="actualizarcampos">
            <div class="col-xs-12 col-md-12 text-center" >
              <input id="id" name="id" type="hidden" class="form-control" value="<?php echo $_POST['id']?>" required> <p></p>
              <input id="barcode" name="barcode" type="text" placeholder="Codigo de Barras " class="form-control" value="<?php echo $_POST['barcode']?>" required> <p></p>
              <input id="lname" name="nombre" type="text" placeholder="Nombre producto " class="form-control" value="<?php echo $_POST['nombreproducto']?>" required> <p></p>
              <input id="date" name="fechacompra" type="date" placeholder="Fecha de compra " class="form-control clickable input-md" value= "<?php echo $_POST['fechacompra']?>" required><p></p>
              <input id="compra" name="valorcompra" type="number" placeholder="Valor de Compra " class="form-control" value="<?php echo $_POST['valorcompra']?>" required> <p></p>
              <input id="ganancia" name="ganancia" type="number" placeholder="Porcentaje de ganancia " class="form-control" value="<?php echo $_POST['ganancia']?>"><p></p>
              <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad de Productos " class="form-control" value="<?php echo $_POST['cantidad']?>"><p></p>
              <input id="proveedor" name="proveedor" type="text" placeholder="Proveedor  de Productos " class="form-control" value="<?php echo $_POST['proveedor']?>"> <p></p>
              <select name="origen" class="form-control" value="<?php echo $_POST['origen']?>" required>
                <option value="">Seleccione un ítem</option> 
                <option value="Nacional">Nacional</option> 
                <option value="Importado">Importado</option>
              </select><p></p>
              <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Por favor ingrese la descripción de producto..." rows="7" value="<?php echo $_POST['descripcion']?>"></textarea><p></p>
              <button type="submit" class="btn btn-outline-success">Guardar</button>
            </div>
        </form>
      </section>
    </div>
  </div>
</body>
</html>
