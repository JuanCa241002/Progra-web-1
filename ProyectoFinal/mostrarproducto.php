<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mostrar productos insertados</title>
</head>

<body>

    <table border="2">
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
            </tr>
            <?php    
        }
            ?>
        
        </tbody>

    </table>
</body>

</html>