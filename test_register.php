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
        <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>

            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="margin-top:1%;margin-bottom:5%;">
                <h2>Registro de examenes Psicologico, Fisico y Medico</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="alert alert-success hide"></div>
                <form id="register_form" novalidate action="test_register.php" method="post" class="container">
                    <fieldset>
                        <h2>Paso 1: Datos del examen</h2>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="date" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="col p-2">
                                <label for="nombre" class="form-label">Jugador:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $jugador['nombre'];?>" disabled>
                            </div>
                            <div class="col p-2">
                                <label for="id" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= $jugador['id_jugador'];?>" disabled>
                            </div>
                        </div>
                        <br>
                        <input type="button" class="next-form btn btn-primary" value="Siguiente" />
                    </fieldset>
                    <fieldset>
                        <?php require 'components/registrar_examen/datos_test_psicologico.php'?>
                    </fieldset>
                    <fieldset>
                        <?php require 'components/registrar_examen/datos_test_fisico.php'?>
                    </fieldset>
                    <fieldset>
                        <?php require 'components/registrar_examen/datos_test_antecedentes_medicos.php'?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
    <script src="js/forms_players/formulario_examen.js"></script>
</body>
</html>
