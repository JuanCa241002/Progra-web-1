<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
</head>
<body>
<!--Inicio conexion de modificar--> <br><br><br>

<?php
    include("conexion.php");//declarando la variable conexion

    $id = $_REQUEST['id'];// valor 
    $query = "SELECT * FROM Productos WHERE id ='$id'";//realizando seleccion de tabla
    $resultado = $conexion->query($query);//reaizando conexion
    $row = $resultado->fetch_assoc();
    ?>
<!--fin de conexion modificar--> <br><br><br>

    <!--php para mostrar y trabajar con insertar datos de tipo IMG--> <br><br><br>
<form action="proceso_modificar.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data"><br><br>  <!--usando metoedo pos-->
    <!--usando metodos para insertar y modificar datos desde el form asia una bd_mueblesinti-->
    <input type ="text" required name="NombreProducto" placeholder="NombreProducto..." value="<?php echo $row['NombreProducto']; ?>"/> <br> <br>
    <input type ="text" required name="descripcion" placeholder="descripcion..." value="<?php echo $row['descripcion']; ?>"/> <br> <br>
    <input type ="text" required name="stock" placeholder="stock..." value="<?php echo $row['stock']; ?>"/> <br> <br>
    <input type ="text" required name="precioUnitario" placeholder="precioUnitario..." value="<?php echo $row['precioUnitario']; ?>"/> <br> <br>
   <!-- fin usando metodos para insertar y modificar datos desde el form asia una bd_mueblesinti-->
   <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/>
   <input type ="file" required name="Imagen"/> <br> <br>
    <!-- fin usando metodos para insertar y modificar IMAGEN desde el form asia una bd_mueblesinti-->
  <!--required para evitar error de llenado en las celdas--> <br><br>
    <input type ="submit" value="Aceptar">
</form>
    
    
</body>
</html>