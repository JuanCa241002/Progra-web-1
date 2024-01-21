<!--Conectar a la DB_MUEBLESINTI-->
<?php
    include("conexion.php");//definir la variable conexion 

    $id = $_REQUEST['id']; //RECUPERAR LA VARIABLE ID 

    $NombreProducto = $_POST['NombreProducto'];
    $descripcion= $_POST['descripcion'];
    $stock = $_POST['stock'];//ojo con este si no lo quero borralo en la BD_dats
    $precioUnitario = $_POST['precioUnitario'];//ojo con este
    //pedir imagen en bits
    $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
    
    $query = "UPDATE Productos SET NombreProducto='$NombreProducto',descripcion='$descripcion', stock='$stock', precioUnitario='$precioUnitario', Imagen='$Imagen' WHERE id = '$id'";
    $resultado = $conexion->query($query);//ojo con el nombre de la conexion

    if($resultado){
    //echo "insertado o modificado";
    header("location:mostrarproducto.php"); //reeviar a la paguina.php
   }
   else{
    echo "no insertado,no modificado";
   }
   ?>