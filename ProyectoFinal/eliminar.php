<!--Conectar a la DB_MUEBLESINTI-->
<?php
    include("conexion.php");//definir la variable conexion 

    $id = $_REQUEST['id']; //RECUPERAR LA VARIABLE ID 

    $query = "DELETE FROM Productos WHERE id = '$id'";
    $resultado = $conexion->query($query);//ojo con el nombre de la conexion

    if($resultado){
    //echo "Eliminado";
    header("location:mostrarproducto.php"); //reeviar a la paguina.php
   }
   else{
    echo "no eliminado";
   }
   ?>