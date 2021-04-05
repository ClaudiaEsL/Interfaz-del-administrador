<?php
    require 'components/verify_sesion.php';
    $id_jugador_test=$_GET['id_jugador'];

    /*Cargar datos del jugador*/
    $records = $conn->prepare("SELECT * FROM jugador WHERE id_jugador = '$id_jugador_test'");
    $records->execute();
    $jugador = $records->get_result()->fetch_assoc();
    /*Cargar datos de cargos */
    $records = $conn->prepare("SELECT * FROM cargo");
    $records->execute();
    $cargo = $records->get_result()->fetch_assoc();
    /*Cargar datos del cuerpo tecnico*/
    $records = $conn->prepare("SELECT * FROM cuerpo_tecnico");
    $records->execute();
    $cuerpo_tecnico = $records->get_result()->fetch_assoc();
    
?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<style type="text/css">
#register_form fieldset:not(:first-of-type) {
display: none;
}
</style>
<body>
<div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>

            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="margin-top:1%;margin-bottom:5%;">
                <h2 class="display-4">Lista de test registrados de: <?=$jugador['nombre'] ?> <?= $jugador['ap_paterno']?></h2>
                <ul class="list-group">
                    <?php
                    $id = $jugador['id_jugador'];
                    $sql = "SELECT * FROM examen WHERE d_jugador04 = '$id'";
                    $resultado = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($resultado)>0){
                        while ($filas = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h6 class="text-dark">Examen registro en <?= $filas['fecha']?></h6>
                            <a href="test_list_show.php?id_examen=<?=$filas['id_examen']?>&id_jugador=<?=$jugador['id_jugador']?>&fecha=<?=$filas['fecha']?>" class="btn btn-primary">Mostrar</a>
                    </li>
                    <?php }
                    }else{?>
                        <p>No hay test registrados</p>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>