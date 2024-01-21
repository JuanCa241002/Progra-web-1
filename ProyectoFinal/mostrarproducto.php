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
            <tr>
                <th>id</th>
                <th>NombreProducto</th>
                <th>descripcion</th>
                <th>stock</th>
                <th>precioUnitario</th>
                <th>Imagen</th>
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

                <td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                <th> <a href="#">Modificar</a> </th>
                <th> <a href="#">Eliminar </a></th>
            </tr>
            <?php    
        }
            ?>

        </tbody>

    </table>
</body>

</html>