<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personas </title>
        <!--Avajo enlaces al framework de boostrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
<h2>Lista de Cliente</h2>

    <!--Inicio Tabla de clientes-->
    <table class="table">
    <thead>
    <tr>
        <th scope="col">COD</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Direccion</th>
    </tr>
    </thead>
    <tbody>
    <?php  
    require_once"conexion.php";
    $sql = "select * from persona;";
    $rtabla = $conex ->query($sql);
    if($rtabla->num_rows>0){ 
        while($r=$rtabla->fetch_array()){ 
        
    ?> 
    <tr>
        <th scope="row"> <?php echo $r['cod']; ?> </th>
        <td><?php echo $r['nombre']; ?></td>
        <td><?php echo $r['apellido']; ?></td>
        <td><?php echo $r['direccion']; ?></td>
    </tr>

    <?php
        }
    }else{
        echo "No hay datos";
    }
    ?>

    </tbody>
</table>
    
    <!--Fin de la tabla de clientes-->


<script src="js/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>