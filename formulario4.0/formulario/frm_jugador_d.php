<?php 
$id_jugador=$_GET['id_jugador'];
include("conexion.php");

$sql="DELETE FROM jugador where id_jugador='".$id_jugador."'";
$resultado=mysqli_query($conexion,$sql);

    if($resultado){
         echo "<script language='JavaScript'>
                        alert('Los datos fueron eliminados exitosamente en la DB')
                        location.assing('indexs.php');
                        </script>";
    }else{
         echo "<script language='JavaScript'>
                        alert('ERROR: Los datos NO  fueron eliminados exitosamente en la DB')
                        location.assing('index.php');
                        </script>";
    }
?>