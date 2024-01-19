<?php
    //$Nombre = $_POST['NomPer'];//llmar el dato nombre del index y realizar la conexion
   // echo $Nombre; //para imprimir 
    $host = "127.0.0.1";
    $usuario = "root";
    $password = "";
    $db = "db_sisweb";
    $conex = new mysqli($host, $usuario, $password, $db); //llamada de datos

?>