<?php 
$id_antecedente=$_GET['id_antecedente'];
include("conexion.php");

$sql="DELETE FROM antecedente_medico where id_antecedente='".$id_antecedente."'";
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