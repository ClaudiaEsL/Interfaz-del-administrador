<?php
    require 'components/verify_sesion.php';

    /*Registrar nuevos usuarios*/
    if(isset($_POST['enviar'])){
        $id_jugador=$_POST['id_jugador'];
        $nombre=$_POST['nombre'];
        $apellido_p=$_POST['apellido_p'];
        $apellido_m=$_POST['apellido_m'];
        $lugar_nacimiento =$_POST['lugar_nacimiento'];
        $fecha_nacimiento=$_POST['fecha_nacimiento'];
        $id_categoria=$_POST['id_categoria'];
        $id_examen=$_POST['id_examen'];
        $id_posicion=$_POST['id_posicion'];
        $id_cuerpo_tecnico=$_POST['id_cuerpo_tecnico'];

    /*FORMULARIO JUGADOR*/
        require 'php/conexion.php';
        $records = $conn->prepare("SELECT * FROM jugador WHERE  id_jugador = '$id_jugador'");
        $records->execute();
        $results = $records->get_result()->fetch_assoc();
        if($results>0){
            echo "<script language='JavaScript'>
                alert('Error: El ID ingresado ya existe. Intentelo nuevamente');
                </script>";
        }else{
            $sql="INSERT INTO jugador(id_jugador, nombre, ap_paterno, ap_materno, lugar_nac, fecha_nac, id_categoria01, id_examen01, id_posicion01, id_cuerpo_tecnico01)VALUES('".$id_jugador."','".$nombre."','".$apellido_p."',
         '".$apellido_m."','".$lugar_nacimiento."','".$fecha_nacimiento."','".$id_categoria."','".$id_examen."',
         '".$id_posicion."', '".$id_cuerpo_tecnico."')";

        $resultado=mysqli_query($conn,$sql);
            if($resultado){
                echo "<script language='JavaScript'>
                alert('Los datos fueron guardados exitosamente en la DB')
                location.assing('index.php');
                </script>";
            }else{
                 echo "<script language='JavaScript'>
                alert('Error: Los datos no fueron guardados. Intentelo nuevamente');
                </script>";
            }
        }
        mysqli_close($conn);
    }
    /*Cargar datos del cuerpo tecnico*/
    
?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
<div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>
        <!--Hoja de estitlo para el formulario-->

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Registrar jugador</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <!--Formulario para registrar al jugador-->
                <form action="<?=$_SERVER['PHP_SELF']?>" class="formularios g-4 bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;">
                    <div class="col-12">
                        <input type="text" name="id_jugador" class="form-control" placeholder="Id_jugador"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="apellido_p" class="form-control" placeholder="Apellido Paterno"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="apellido_m" class="form-control" placeholder="Apellido Materno"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="lugar_nacimiento" class="form-control" placeholder="Lugar De Nacimiento"  required>
                    </div>
                    <div class="col-12">
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="id_categoria" class="form-control" placeholder="Categoria"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="id_examen" class="form-control" placeholder="Examen"  required>
                    </div>
                    <div class="col-12">
                           <input type="text" name="id_posicion" class="form-control" placeholder="Posicion"  required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="id_cuerpo_tecnico" class="form-control" placeholder="Entrenador"  required>
                    </div>
                    <ul class="error" id="error"></ul>
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
