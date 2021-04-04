<?php 
$id_psicologico=$_GET['id_psicologico'];
include("conexion.php");

$sql="DELETE FROM psicologico where id_psicologico='".$id_psicologico."'";
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