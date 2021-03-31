<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "clubdeportivo";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$conn){
        die("No hay conexion: ".mysqli_connect_error());
    }
?>