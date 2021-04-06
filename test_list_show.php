<?php
    require 'components/verify_sesion.php';
    $id_jugador=$_GET['id_jugador'];
    $id_examen=$_GET['id_examen'];
    $fecha=$_GET['fecha'];

    /*Cargar datos del jugador*/
    $records = $conn->prepare("SELECT * FROM jugador WHERE id_jugador = '$id_jugador'");
    $records->execute();
    $jugador = $records->get_result()->fetch_assoc();
    /*Cargar datos del examen*/
    $records = $conn->prepare("SELECT * FROM examen WHERE id_examen = '$id_examen' AND fecha = '$fecha'");
    $records->execute();
    $examen = $records->get_result()->fetch_assoc();
    $id_psicologico = $examen['id_psicologico01'];
    $id_predeportivo = $examen['id_predeportivo01'];
    /*Cargar datos del examen psicologico*/
    $records = $conn->prepare("SELECT * FROM psicologico WHERE id_psicologico = '$id_psicologico'");
    $records->execute();
    $examen_psicologico = $records->get_result()->fetch_assoc();
    /*Cargar datos del examen predeportivo*/
    $records = $conn->prepare("SELECT * FROM predeportivo WHERE id_predeportivo = '$id_predeportivo'");
    $records->execute();
    $examen_predeportivo = $records->get_result()->fetch_assoc();
    $fisico = $examen_predeportivo['id_fisico01'];
    $medico = $examen_predeportivo['id_antecedente01'];
    /*Cargar datos del examen fisico*/
    $records = $conn->prepare("SELECT * FROM fisico WHERE id_fisico = '$fisico'");
    $records->execute();
    $examen_fisico = $records->get_result()->fetch_assoc();
    /*Cargar datos del examen antecedentes medicos*/
    $records = $conn->prepare("SELECT * FROM antecedente_medico WHERE id_antecedente = '$medico'");
    $records->execute();
    $examen_medico = $records->get_result()->fetch_assoc();
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
                <h2 clas    s="display-4">Examen de: <?=$jugador['nombre'] ?> <?= $jugador['ap_paterno']?></h2>
                <div class="d-flex justify-content-between bg-primary p-2 text-white"><h6>Fecha de registro: <?= $examen['fecha']?></h6><h6> del examen: <?= $examen['id_examen']?></h6></div>
                <div class="list-group border p-1">
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <h6 class="text-dark">Ficha del examen Psicologico</h6>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Tactica mental: <?= $examen_psicologico['efect_tactica_mental']?><br>
                                    Eleccion: <?= $examen_psicologico['eleccion']?><br>
                                    Observaciones: <?= $examen_psicologico['observaciones']?><br>
                                    Rapidez mental: <?= $examen_psicologico['rapidez']?><br>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <h6 class="text-dark">Ficha del examen Fisico</h6>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Articulaciones: <?= $examen_fisico['articulaciones']?><br>
                                    Control de vista: <?= $examen_fisico['control_vista']?><br>
                                    Estatura: <?= $examen_fisico['estatura']?><br>
                                    Flexibilidad: <?= $examen_fisico['flexibilidad']?><br>
                                    Peso: <?= $examen_fisico['peso']?><br>
                                    Postura: <?= $examen_fisico['postura']?><br>
                                    Pulso: <?= $examen_fisico['pulso']?><br>
                                    Resistencia: <?= $examen_fisico['resistencia']?><br>
                                    Tension arterial: <?= $examen_fisico['tension_arterial']?><br>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <h6 class="text-dark">Ficha del examen de antecedentes medicos</h6>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Alergias: <?= $examen_medico['alergias']?><br>
                                    Cirujias: <?= $examen_medico['cirugias']?><br>
                                    Enfermedades familiares: <?= $examen_medico['enfermedades_flia']?><br>
                                    Enfermedades: <?= $examen_medico['enfermedades']?><br>
                                    Lesiones: <?= $examen_medico['lesiones']?><br>
                                    Medicamentos: <?= $examen_medico['medicamentos']?><br>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>