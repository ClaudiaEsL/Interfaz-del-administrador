<?php 
/*  Conexion a la base de datos*/
require 'php/conexion.php';
$id_jugador=$_GET['id_jugador'];

$sql="DELETE FROM jugador where id_jugador='".$id_jugador."'";
$resultado = mysqli_query($conn,$sql);

    if($resultado){
         echo "<script language='JavaScript'>
                        alert('Los datos fueron eliminados exitosamente en la DB');
                        </script>";
                        header('location:player_list.php');
    }else{
         echo "<script language='JavaScript'>
                        alert('ERROR: Los datos NO  fueron eliminados exitosamente en la DB');
                        </script>";
                       header('location:player_list.php');
    }
?>