<?php 
    include ("php/usuario.php");
    $id = $_GET['id'];
    $registro = usuario::eliminar_registro($id);
    header("location:cuerpo_tecnico_list.php");
?>

