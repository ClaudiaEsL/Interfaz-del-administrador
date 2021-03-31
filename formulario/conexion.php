<?php 
    
    $dbhost= "localhost";
    $dbuser = "root";
    $dbpass= "";
     $dbname = "clubdeportivo";

    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if($conexion){
        echo "Conectado";
    }else{
        echo "Sin conexion a la base de datos";
    }

?>