<!--Conectar a la DB_MUEBLESINTI-->
<?php
    include("conexion.php");//definir la variable conexion 

    $NombreProducto = $_POST['NombreProducto'];
    $descripcion= $_POST['descripcion'];
    $stock = $_POST['stock'];//ojo con este si no lo quero borralo en la BD_dats
    $precioUnitario = $_POST['precioUnitario'];//ojo con este
    //pedir imagen en bits
    $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
    
    $query = "INSERT INTO Productos(NombreProducto,descripcion,Imagen,stock,precioUnitario) VALUES('$NombreProducto','$descripcion','$Imagen','$stock','$precioUnitario')";
    $resultado = $conexion->query($query);//ojo con el nombre de la conexion

    if($resultado){
    //echo "insertado";
    header("location:mostrarproducto.php"); //reeviar a la paguina.php
   }
   else{
    echo "no insertado";
   }
   ?>