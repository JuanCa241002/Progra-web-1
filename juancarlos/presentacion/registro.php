<?php
    require_once "conexion.php";
    $nombre = $_POST['nomper'];
    $apellido = $_POST['apeper'];
    $direccion = $_POST['dirper'];
    $sql = "insert into persona (nombre, apellidos, direccion) value ('$nombre','$apellido', '$direccion')";
    $conex->query($sql);
?>