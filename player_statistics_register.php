<?php
    require 'components/verify_sesion.php';
    include("php/conexion.php");
    $id_jugador=$_GET['id_jugador'];
    /*Registrar nuevos usuarios*/
    if(isset($_POST['enviar'])){
        
            $torneo =$_POST['torneo'];
            $id_jugador =$_POST['id_jugador'];
            $partidos_jugados =$_POST['partidos_jugados'];
            $goles =$_POST['goles'];
            $asistencias =$_POST['asistencias'];
            $min_jugados =$_POST['min_jugados'];
            $remates =$_POST['remates'];
            $faltas_recibidas =$_POST['faltas_resbidas'];
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

            /*FORMULARIO JUGADOR*/
            
            $records = $conn->prepare("INSERT INTO estad_jugador (partidos_jugados, goles, asistencias, min_jugados, remates, 
            faltas_recibidas, pases, goles_penalti, balones_recuperados, faltas_cometidas, partidos_titular, partidos_suplente,
            goles_cabeza, goles_pie_izq, goles_pie_der, penaltis_lanzados, goles_falta_directa, goles_recibidos, 
            partidos_inavilitado, goles_centro, goles_fuera, paradas_centro, paradas_fuera, id_torneo01, id_jugador03) 
            VALUES ('".$partidos_jugados."','".$goles."','".$asistencias."','".$min_jugados."','".$remates."','".$faltas_recibidas."',
            '".$pases."','".$goles_penalti."','".$balones_recuperdos."','".$faltas_cometidas."','".$partidos_titular."',
            '".$partidos_suplente."','".$goles_cabeza."','".$goles_pie_der."','".$goles_pie_izq."','".$penaltis_lanzados."',
            '".$goles_falta_directa."','".$goles_recibidos."','".$partidos_inavilitados."','".$goles_centro."','".$goles_fuera."',
            '".$paradas_centro."','".$paradas_fuera."','".$torneo."','".$id_jugador."')");

            if($records-> execute()){
                echo "<script language='JavaScript'>
                    alert('Los datos fueron guardados exitosamente en la DB');
                    </script>";
            }
            else{
                echo "<script language='JavaScript'>
                alert('Error: Los datos no fueron guardados. Intentelo nuevamente');
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
        <!--Hoja de estitlo para el formulario-->

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Registrar Estadisticas De Jugador</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display:flex;justify-content:center;margin-top:1%;margin-bottom:5%;" >
                <!--Formulario para registrar al jugador-->
                <form action="<?=$_SERVER['PHP_SELF']?>" class="formularios g-4 bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;" enctype="multipart/form-data">
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Id del jugador:</label>
                            <input type="text" name="id_jugador" class="form-control" disabled value="<?php echo $id_jugador; ?>" >
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Partidos Jugados:</label>
                            <input type="text" name="partidos_jugados" class="form-control" placeholder="Partidos Jugados"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Partidos Jugados:</label>
                            <input type="text" name="partidos_jugados" class="form-control" placeholder="Partidos Jugados"  required>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles:</label>
                            <input type="text" name="goles" class="form-control"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Asistencias:</label>
                            <input type="text" name="asistencias" class="form-control" placeholder="Asistencias"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Minutos Jugados:</label>
                            <input type="text" name="min_jugados" class="form-control" placeholder="Minutos Jugados"  required>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Remates:</label>
                            <input type="text" name="remates" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Faltas Resividas:</label>
                            <input type="text" class="form-control" name="faltas_resbidas" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Pases:</label>
                            <input type="text" name="pases" class="form-control" placeholder="Cantidad de pases acumulados"  required>
                        </div>            
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Penalti:</label>
                            <input type="text" name="goles_penalti" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Pases:</label>
                            <input type="text" name="pases" class="form-control" placeholder="Cantidad de pases acumulados"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Penalti:</label>
                            <input type="text" name="goles_penalti" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Pases:</label>
                            <input type="text" name="pases" class="form-control" placeholder="Cantidad de pases acumulados"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Penalti:</label>
                            <input type="text" name="goles_penalti" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Balones Recuperados:</label>
                            <input type="text" name="balones_recuperados" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Faltas Cometidas:</label>
                            <input type="text" name="faltas_cometidas" class="form-control" placeholder="Cantidad "  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Partidos Titular:</label>
                            <input type="text" name="partidos_titular" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Partidos Suplente:</label>
                            <input type="text" name="partidos_suplente" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Cabeza:</label>
                            <input type="text" name="goles_cabeza" class="form-control" placeholder="Cantidad "  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Pie Izquierdo:</label>
                            <input type="text" name="goles_pie_izq" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Pie Derecho:</label>
                            <input type="text" name="goles_pie_der" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Penaltis Lanzados:</label>
                            <input type="text" name="penaltis_lanzados" class="form-control" placeholder="Cantidad "  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Falta Directa:</label>
                            <input type="text" name="goles_falta_directa" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles Recibidos:</label>
                            <input type="text" name="goles_recibidos" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Partidos Inavilitado:</label>
                            <input type="text" name="partidos_inavilitados" class="form-control" placeholder="Cantidad "  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Centro:</label>
                            <input type="text" name="goles_centro" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Goles De Fuera:</label>
                            <input type="text" name="goles_fuera" class="form-control" placeholder="Cantidad"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Paradas Centro</label>
                            <input type="text" name="paradas_centro" class="form-control" placeholder="Cantidad "  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Paradas De fuera:</label>
                            <input type="text" name="paradas_fuera" class="form-control" placeholder="Cantidad"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputcargo" class="form-label">Torneo:</label>
                            <select class="form-select form-select-sm"  name="torneo" id="inputcargo" required >
                            <option  value="" disabled selected>-Seleccione una opcion-</option>
                            <?php
                                $consulta1 =  mysqli_query($conn,"SELECT id_torneo, nombre FROM torneo");
                                while($categoria = mysqli_fetch_array($consulta1)){
                            ?>
                                <option  value="<?= $categoria['id_torneo']?>"><?= $categoria['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar" style="width:100%;" required>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>
