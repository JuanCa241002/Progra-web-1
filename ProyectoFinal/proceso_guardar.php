<!--Conectar a la DB_MUEBLESINTI-->
<?php
    $NombreProducto = $_POST['NombreProducto'];
    $descripcion= $_POST['descripcion'];
    $stock = $_POST['stock'];//ojo con este si no lo quero borralo en la BD_dats
    $precioUnitario = $_POST['precioUnitario'];//ojo con este
    //pedir imagen en bits
    $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

    $query = "INSERT INTO Productos(NombreProducto, descripcion, imagenes, stock, precioUnitario) VALUES('$NombreProducto','$descripcion','$Imagen','$stock','$precioUnitario')";
    $resultado = $conexion->query($query);
   if(resultado){
    echo "insertado";
   }
   else{
    echo "no insertado";
   }
   ?>