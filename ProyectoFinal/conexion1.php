<!--Conectar a la DB_MUEBLESINTI-->
<?php
$conexion = new mysqli("localhost","root","","db_mueblesinti");
if($conexion){
        echo "conexion exitosa";
}
else{
        echo"sin  conexion";       
}    

?>
