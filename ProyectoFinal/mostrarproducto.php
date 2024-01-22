<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    [16:33] carlos eduardo crespo mamani
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>mostrar productos insertados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
     <!--Inicio de la barra de navegacion-->
  <div class="b-example-divider"></div>

<header class="p-3 text-bg-dark">
  <div class="container">

    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap" />
        </svg>
        <!--Inicio del logotipo-->
        <a class="navbar-brand" href="index.html">
          <img src="img/logotipo.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          Inicio
        </a>
        <!--Fin del logotipo--></a>
--
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.html" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Reseña</a></li>
        <li><a href="oferta.html" class="nav-link px-2 text-white">Oferta</a></li>
        <li><a href="Catalogo.html" class="nav-link px-2 text-white">Catalogo</a></li>
        <li><a href="filtrado.html" class="nav-link px-2 text-white">Filtrar</a></li>
        <li><a href="adminIndex.html" class="nav-link px-2 text-white">ADMINISTRADOR</a></li>
        <li><a href="mostrarproducto.php" class="nav-link px-2 text-white"> CATALOGO</a></li>
      
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
          aria-label="Search">
      </form>

      <div class="text-end">
        <a href="login.html" class="btn btn-outline-light me-2">Login</a>
        <button type="button" class="btn btn-warning">Sign-up</button>
      </div>
    </div>
  </div>
</header>

<!--fin de la barra de navegacion-->


    <table class="table" border="2">
        <thead>
            <!--avajo para nueva accion--> 
            <tr>
                <th colspan="8"><a href="adminIndex.html">Nuevo</a></th>
                <!--colspan para aggaran columnas y redireccionar al index-->
            </tr>
            <tr>
                <th>id</th>
                <th>NombreProducto</th>
                <th>descripcion</th>
                <th>stock</th>
                <th>precioUnitario</th>
                <th>Imagen</th>
                <th colspan="2">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
    include("conexion.php");//declarando la variable conexion
    $query = "SELECT * FROM Productos";//realizando seleccion de tabla
    $resultado = $conexion->query($query);//reaizando conexion
    while($row = $resultado->fetch_assoc()){
    ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['NombreProducto']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['precioUnitario']; ?></td>
            <!--avajo para extraer la IMG de la BD_mueblesinti-->
                <td> <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                <th> <a href="modificar.php?id=<?php echo $row['id']; ?>">Modificar</a> </th>
                <th> <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar </a></th>
                <th> <a href="modificar.php?id=<?php echo $row['id']; ?>">agregar al carrito</a> </th>

            </tr>
            <?php    
        }
            ?>
        
        </tbody>

    </table>

     <!--avajo enlace para framework boostrap-->
  <script src="js/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>