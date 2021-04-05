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
    if (isset($_POST['submit'])) {
        /*Cargar los datos en variables */
        /*Psicologico */
        $eleccion=$_POST['eleccion'];
        $rapidez=$_POST['rapidez'];
        $efect_tactica_mental=$_POST['efect_tactica_mental'];
        $observaciones =$_POST['observaciones'];
        $id_psicologo =$_POST['psicologo'];

        /*Fisico */
        $estatura=$_POST['estatura'];
        $peso=$_POST['peso'];
        $pulso=$_POST['pulso'];
        $control_vista =$_POST['control_vista'];
        $postura =$_POST['postura'];
        $articulaciones =$_POST['articulaciones'];
        $resistencia =$_POST['resistencia'];
        $flexibilidad =$_POST['flexibilidad'];
        $tension_arterial =$_POST['tension_arterial'];
        $id_preparador =$_POST['preparador_fisico'];

        /*Medico*/
        $enfermedades_f=$_POST['enfermedades_f'];
        $enfermedades=$_POST['enfermedades'];
        $cirugias=$_POST['cirugias'];
		$alergias=$_POST['alergias'];
		$lesiones=$_POST['lesiones'];
        $medicamentos =$_POST['medicamentos'];
        $id_medico=$_POST['medico'];

        /*Examen */
        $id_jugador =$id_jugador_test;
        $fecha_registro=$_POST['date'];
        /*Inicializar la clase de examen */
        require 'php/examen.php';
        /*Agregar el examen fisico/Devolver valor de id  */
        $id_fisico_obtenido = examen::agregar_examen_fisico($estatura, $peso, $pulso, $control_vista,$postura,$articulaciones, $resistencia, $flexibilidad, $tension_arterial, $id_preparador);

        /*Agregar el examen antecedentes medicos/Devolver valor de id */
        $id_medico_obtenido = examen::agregar_examen_antecedentes_medicos($enfermedades_f, $enfermedades, $cirugias, $alergias, $lesiones,$medicamentos,$id_medico);

        /*Agregar el examen psicologico*/
         $id_psicologico_obtenido = examen::agregar_examen_psicologico($eleccion, $rapidez,$efect_tactica_mental,$observaciones, $id_psicologo);

         /*Agregar el examen predeportivo */
        $id_predeportivo_obtenido = examen::agregar_examen_predeportivo($id_fisico_obtenido, $id_medico_obtenido);

        /*Agregar los datos del examen */
        $mensaje = examen::agregar_examen($id_jugador, $fecha_registro, $id_psicologico_obtenido, $id_predeportivo_obtenido );
    }


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
                <h2>Registro de examenes Psicologico, Fisico y Medico</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="alert alert-success hide"></div>
                <form id="register_form" novalidate action="test_register.php?id_jugador=<?=$jugador['id_jugador']?>" method="post" class="container">
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
                                <label for="id" class="form-label">ID del jugador:</label>
                                <input type="text" class="form-control" id="id" name="id_jugador" value="<?= $jugador['id_jugador'];?>" disabled>
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
                        <input type="submit" name="submit" class="submit btn btn-success" value="Guardar datos" />
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
