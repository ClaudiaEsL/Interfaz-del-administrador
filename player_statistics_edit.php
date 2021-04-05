  <?php
    include("conexion.php");
    require 'components/verify_sesion.php';
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <?php
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

            $sql= "update estad_jugador set  partidos_jugados='".$partidos_jugados."', goles='".$goles."',
             asistencias='".$asistencias."', min_jugados='".$min_jugados."', remates='".$remates."',
             faltas_recibidas='".$faltas_recibidas."', pases='".$pases."', goles_penalti='".$goles_penalti."',
             balones_recuperados='".$balones_recuperdos."', faltas_cometidas='".$faltas_cometidas."',
             partidos_titular='".$partidos_titular."',partidos_suplente='".$partidos_suplente."',goles_cabeza='".$goles_cabeza."',
             goles_pie_izq='".$goles_pie_izq."',goles_pie_der='".$goles_pie_der."',penaltis_lanzados='".$penaltis_lanzados."',
             goles_falta_directa='".$goles_falta_directa."',goles_recibidos='".$goles_recibidos."',
             partidos_inavilitado='".$partidos_inavilitados."',goles_centro='".$goles_centro."',goles_fuera='".$goles_fuera."',
             paradas_centro='".$paradas_centro."',paradas_fuera='".$paradas_fuera."',id_torneo01='".$torneo."',id_jugador03='".$id_jugador."' ";
               
                $resultado=mysqli_query($conexion,$sql);

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
                
                mysqli_close($conexion);


    }else{

        $id_estad_jugador=$_GET['id_estad_jugador'];
        $sql= "SELECT * FROM estad_jugador WHERE id_estad_jugador='".$id_estad_jugador."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado);  

            $torneo =$fila['torneo'];
            $id_jugador =$fila['id_jugador'];
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
            $partidos_inavilitados =$fila['partidos_inavilitados'];
            $goles_centro =$fila['goles_centro'];
            $goles_fuera =$fila['goles_fuera'];
            $paradas_centro =$fila['paradas_centro'];
            $paradas_fuera =$fila['paradas_fuera'];

        mysqli_close($conexion);
    ?>
    <div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
            <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>
            <!--Hoja de estitlo para el formulario-->

                <h2 class="text-center" style="font-size: 18px;margin-top:1%;">Registrado De Estadisticas De Jugador</h2>
                <!--Mensaje de registro-->
                <?php require 'components/mensaje_registro.php';?>
                <!---->
                <div class="container" style="display: flex; justify-content:center;">
                    <!--Formulario para registrar al jugador-->
                    <form action="player_statistics.php?id_statistics_jugador=<?= $id_estad_jugador?>" class="formularios g-4 bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="hidden" name="id_estad_jugador" class="form-control" value="<?php echo $id_estad_jugador; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="partidos_jugados" class="form-control" value="<?php echo $partidos_jugados; ?>" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles" class="form-control" value="<?php echo $goles; ?>"required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="remates" class="form-control" value="<?php echo $remates; ?>" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="asistencias" class="form-control" value="<?php echo $asistencias; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="min_jugados" class="form-control" value="<?php echo $min_jugados; ?>" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="faltas_recibidas" class="form-control" value="<?php echo $faltas_recibidas; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="pases" class="form-control" value="<?php echo $pases; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_penalti" class="form-control" value="<?php echo $goles_penalti; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="balones_recuperados" class="form-control" value="<?php echo $balones_recuperdos; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="faltas_cometidas" class="form-control" value="<?php echo $faltas_cometidas; ?>" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="partidos_titular" class="form-control" value="<?php echo $partidos_titular; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="partidos_suplente" class="form-control" value="<?php echo $partidos_suplente; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_cabeza" class="form-control" value="<?php echo $goles_cabeza; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_pie_der" class="form-control" value="<?php echo $goles_pie_der; ?>" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_pie_izq" class="form-control" value="<?php echo $goles_pie_izq; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="penaltis_lanzados" class="form-control" value="<?php echo $penaltis_lanzados; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_falta_directa" class="form-control" value="<?php echo $goles_falta_directa; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_recibidos" class="form-control" value="<?php echo $goles_recibidos; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="partidos_inavilitados" class="form-control" value="<?php echo $partidos_inavilitados; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_centro" class="form-control" value="<?php echo $goles_centro; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="goles_fuera" class="form-control" value="<?php echo $goles_fuera; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="paradas_centro" class="form-control" value="<?php echo $paradas_centro; ?>"  required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="paradas_fuera" class="form-control" value="<?php echo $paradas_fuera; ?>" required>
                    
                        <label for="inputespecialista" class="form-label">Torneo:</label><br>
                            <select name="torneo" value="<?php echo $torneo ; ?>" required >
                            <?php
                            include("conexion.php");
                                $consulta =  mysqli_query($conexion,"SELECT id_torneo, nombre FROM estad_jugador");
                                while($datos = mysqli_fetch_array($consulta)){
                            ?>
                                <option  value="<?= $datos['id_torneo']?>"><?= $datos['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                            
                        
                        <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar" style="width:100%;" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>

       

               
    <?php
    }
    ?>
   <script src="formulario.js"></script>
</body>
</html>