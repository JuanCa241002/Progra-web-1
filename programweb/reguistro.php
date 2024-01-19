<?php
    require_once "conexion.php";//hacemos referencia a la conexion
    $nombre = $_POST['NomPer'];//declaramos y llamamos el objeto del index
    $apellido = $_POST['ApePer'];
    $direccion = $_POST['DirPer'];
    $sql = "insert into persona(nombre, apellido, direccion) values('$nombre','$apellido','$direccion');";
    $conex->query($sql);//conexion al sql
    header('Location: frmreguistro.html');
?>