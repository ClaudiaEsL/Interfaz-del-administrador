<?php 
$id_fisico=$_GET['id_fisico'];
include("conexion.php");

$sql="DELETE FROM fisico where id_fisico='".$id_fisico."'";
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