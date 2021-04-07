<?php 
    include ("php/usuario.php");
    $id = $_GET['id'];
    $registro = usuario::eliminar_registro_usuario($id);
    header("location:user_list.php");
?>

