  <?php
    require 'components/verify_sesion.php';
    $id_estad_jugador=$_GET['id_jugador'];
    $verificar = false;
    /*Cargar datos del jugador*/
    $records = $conn->prepare("SELECT * FROM jugador WHERE id_jugador = '$id_estad_jugador'");
    $records->execute();
    $jugador = $records->get_result()->fetch_assoc();
    /*Si el jugador tiene registros */
    $sql= "SELECT * FROM estad_jugador WHERE id_jugador03 = '$id_estad_jugador'";
    $resultado=mysqli_query($conn,$sql);
    if(mysqli_num_rows($resultado)>0){
        $fila = mysqli_fetch_assoc($resultado);

        $torneo =$fila['id_torneo01'];
        $id_jugador =$fila['id_jugador03'];
        $partidos_jugados =$fila['partidos_jugados'];
        $goles =$fila['goles'];
        $asistencias =$fila['asistencias'];
        $min_jugados =$fila['min_jugados'];
        $remates =$fila['remates'];
        $faltas_recibidas =$fila['faltas_recibidas'];
        $pases =$fila['pases'];
        $goles_penalti =$fila['goles_penalti'];
        $balones_recuperdos =$fila['balones_recuperados'];
        $faltas_cometidas =$fila['faltas_cometidas'];
        $partidos_titular =$fila['partidos_titular'];
        $partidos_suplente =$fila['partidos_suplente'];
        $goles_cabeza =$fila['goles_cabeza'];
        $goles_pie_der =$fila['goles_pie_der'];
        $goles_pie_izq =$fila['goles_pie_izq'];
        $penaltis_lanzados =$fila['penaltis_lanzados'];
        $goles_falta_directa =$fila['goles_falta_directa'];
        $goles_recibidos =$fila['goles_recibidos'];
        $partidos_inavilitados =$fila['partidos_inavilitado'];
        $goles_centro =$fila['goles_centro'];
        $goles_fuera =$fila['goles_fuera'];
        $paradas_centro =$fila['paradas_centro'];
        $paradas_fuera =$fila['paradas_fuera'];
        /*Verifica si existe */
        $verificar = true;
    }else{
        $mensaje = "No existen registros de estadisticas del jugador seleccionado";
    }

    if (isset($_POST['enviar'])) {

        $torneo =$_POST['torneo'];
        $id_jugador =$_POST['id_jugador'];
        $partidos_jugados =$_POST['partidos_jugados'];
        $goles =$_POST['goles'];
        $asistencias =$_POST['asistencias'];
        $min_jugados =$_POST['min_jugados'];
        $remates =$_POST['remates'];
        $faltas_recibidas =$_POST['faltas_recibidas'];
        $pases =$_POST['pases'];
        $goles_penalti =$_POST['goles_penalti'];
        $balones_recuperdos =$_POST['balones_recuperados'];
        $faltas_cometidas =$_POST['faltas_cometidas'];
        $partidos_titular =$_POST['partidos_titular'];
        $partidos_suplente =$_POST['partidos_suplente'];
        $goles_cabeza =$_POST['goles_cabeza'];
        $goles_pie_der =$_POST['goles_pie_der'];
        $goles_pie_izq =$_POST['goles_pie_izq'];
        $penaltis_lanzados =$_POST['penaltis_lanzados'];
        $goles_falta_directa =$_POST['goles_falta_directa'];
        $goles_recibidos =$_POST['goles_recibidos'];
        $partidos_inavilitados =$_POST['partidos_inavilitados'];
        $goles_centro =$_POST['goles_centro'];
        $goles_fuera =$_POST['goles_fuera'];
        $paradas_centro =$_POST['paradas_centro'];
        $paradas_fuera =$_POST['paradas_fuera'];
        /*Actualizar los datos */
        $sql= "update estad_jugador set  partidos_jugados='".$partidos_jugados."', goles='".$goles."',
             asistencias='".$asistencias."', min_jugados='".$min_jugados."', remates='".$remates."',
             faltas_recibidas='".$faltas_recibidas."', pases='".$pases."', goles_penalti='".$goles_penalti."',
             balones_recuperados='".$balones_recuperdos."', faltas_cometidas='".$faltas_cometidas."',
             partidos_titular='".$partidos_titular."',partidos_suplente='".$partidos_suplente."',goles_cabeza='".$goles_cabeza."',
             goles_pie_izq='".$goles_pie_izq."',goles_pie_der='".$goles_pie_der."',penaltis_lanzados='".$penaltis_lanzados."',
             goles_falta_directa='".$goles_falta_directa."',goles_recibidos='".$goles_recibidos."',
             partidos_inavilitado='".$partidos_inavilitados."',goles_centro='".$goles_centro."',goles_fuera='".$goles_fuera."',
             paradas_centro='".$paradas_centro."',paradas_fuera='".$paradas_fuera."',id_torneo01='".$torneo."',id_jugador03='".$id_jugador."' ";
        
        $resultado=mysqli_query($conn,$sql);
        if($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ACTUALIZADOS exitosamente en la DB')
                    location.assing('index.php');
                    </script>";
        }else{
            echo "<script language='JavaScript'>
            alert('Erorr: Los datos NO fueron ACTUALIZADOS exitosamente en la DB');
            location.assing('index.php');
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
    <div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
            <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>
            <h2 class="text-center" style="margin-top:1%;">Datos estadisticos registrados</h2>
                <!--Mensaje de registro-->
                <?php require 'components/mensaje_registro.php';?>
                <?php if($verificar == true):?>
                <h6 class="text-center">Jugador:  <?= $jugador['nombre']?></h6>
                <!---->
                <div class="container d-flex justify-content-center" style="margin-top:1%;margin-bottom:5%;">
                    <!--Formulario para registrar al jugador-->
                    <form action="player_statistics.php?id_statistics_jugador=<?= $id_estad_jugador?>" class="formularios bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;" enctype="multipart/form-data">
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Id del jugador:</label>
                            <input type="text" name="id_estad_jugador" class="form-control col-md-2" value="<?php echo $id_estad_jugador; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputespecialista" class="form-label col-md-6">Torneo:</label><br>
                            <select class="form-select form-select-sm col-md-2"  name="torneo" id="inputcargo" required disabled>
                            <?php
                                $consulta1 =  mysqli_query($conn,"SELECT id_torneo, nombre FROM torneo WHERE id_torneo = '$torneo'");
                                while($categoria = mysqli_fetch_array($consulta1)){
                            ?>
                                <option   value="<?= $categoria['id_torneo']?>"><?= $categoria['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Partidos jugados:</label>
                            <input type="text" name="partidos_jugados" class="form-control col-md-2" value="<?php echo $partidos_jugados; ?>" required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº goles registrados:</label>
                            <input type="text" name="goles" class="form-control col-md-2" value="<?php echo $goles; ?>"required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº remates registrados:</label>
                            <input type="text" name="remates" class="form-control col-md-2" value="<?php echo $remates; ?>" required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de asistencias:</label>
                            <input type="text" name="asistencias" class="form-control col-md-2" value="<?php echo $asistencias; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Minutos jugados registrados:</label>
                            <input type="text" name="min_jugados" class="form-control col-md-2" value="<?php echo $min_jugados; ?>" required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de faltas recibidas:</label>
                            <input type="text" name="faltas_recibidas" class="form-control col-md-2" value="<?php echo $faltas_recibidas; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de pases:</label>
                            <input type="text" name="pases" class="form-control col-md-2" value="<?php echo $pases; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles penalti:</label>
                            <input type="text" name="goles_penalti" class="form-control col-md-2" value="<?php echo $goles_penalti; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de balones recuperados:</label>
                            <input type="text" name="balones_recuperados" class="form-control col-md-2" value="<?php echo $balones_recuperdos; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de faltas cometidas:</label>
                            <input type="text" name="faltas_cometidas" class="form-control col-md-2" value="<?php echo $faltas_cometidas; ?>" required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de partidos titulares:</label>
                            <input type="text" name="partidos_titular" class="form-control col-md-2" value="<?php echo $partidos_titular; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de participaciones en partidos suplente:</label>
                            <input type="text" name="partidos_suplente" class="form-control col-md-2" value="<?php echo $partidos_suplente; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles por cabeza:</label>
                            <input type="text" name="goles_cabeza" class="form-control col-md-2" value="<?php echo $goles_cabeza; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles con pie derecho:</label>
                            <input type="text" name="goles_pie_der" class="form-control col-md-2" value="<?php echo $goles_pie_der; ?>" required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles con pie izquierdo:</label>
                            <input type="text" name="goles_pie_izq" class="form-control col-md-2" value="<?php echo $goles_pie_izq; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de penaltiz lanzados:</label>
                            <input type="text" name="penaltis_lanzados" class="form-control col-md-2" value="<?php echo $penaltis_lanzados; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles por falt directa:</label>
                            <input type="text" name="goles_falta_directa" class="form-control col-md-2" value="<?php echo $goles_falta_directa; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles recibidos:</label>
                            <input type="text" name="goles_recibidos" class="form-control col-md-2" value="<?php echo $goles_recibidos; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de partidos inhabilitados:</label>
                            <input type="text" name="partidos_inavilitados" class="form-control col-md-2" value="<?php echo $partidos_inavilitados; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles por centro:</label>
                            <input type="text" name="goles_centro" class="form-control col-md-2" value="<?php echo $goles_centro; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de goles por fuera:</label>
                            <input type="text" name="goles_fuera" class="form-control col-md-2" value="<?php echo $goles_fuera; ?>"  required disabled>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de paradas por centro:</label>
                            <input type="text" name="paradas_centro" class="form-control col-md-2" value="<?php echo $paradas_centro; ?>"  required disabled>
                        </div>
                        <!--Ejemplo-->
                        <div class="col-md-4 d-flex flex-row">
                            <label for="inputEmail" class="form-label col-md-6">Nº de paradas por fuera:</label>
                            <input type="text" id="paradas_fuera" name="paradas_fuera" class="form-control col-md-2" value="<?php echo $paradas_fuera; ?>" required disabled>
                        </div>
                        <input type="button" class="btn btn-success" id="btn-editar" style="width:100%;" onclick="activar_formulario_estadisticas()" value="Actualizar datos">
                        <div id="opciones-edicion" style="display:none;">
                            <input id="btn-enviar" type="submit" class="btn btn-primary" name="enviar" value="Actualizar" style="width:50%;" required>
                            <input class="btn btn-danger" onclick="desactivar_formulario_estadisticas()" style="width:50%;" value="Cancelar">
                        </div>
                    </form>
                </div>
                <?php else:?>
                <div class="d-flex justify-content-center">
                    <?php echo "<a title='Registro Estadistica' class='btn btn-success' style='color:white; margin-left:1%;' href='player_statistics_register.php?id_jugador=".$id_estad_jugador."'>Crear un registro de las estadisticas del jugador</a>"; ?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
    <
    <script src="js/animaciones/form_active_estadisticas.js"></script>
</body>
</html>