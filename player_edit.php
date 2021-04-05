<?php
    require 'components/verify_sesion.php';
    /*  Conexion a la base de datos*/
    require 'php/conexion.php';
    /*Cargar los datos del formulario*/
    $id = $_GET['id_jugador'];
    $records = $conn->prepare("SELECT * FROM jugador WHERE  id_jugador = '$id'");
    $records->execute();
    $personas = $records->get_result()->fetch_assoc();

    /*Actualizar datos del jugador*/
    if(!empty($_POST['nombre']) && !empty($_POST['apellido_p']) && !empty($_POST['apellido_m'])&& !empty($_POST['lugar_nacimiento'])&& !empty($_POST['fecha_nacimiento'])&& !empty($_POST['id_categoria'])&& !empty($_POST['id_posicion'])&& !empty($_POST['id_cuerpo_tecnico']))
    {
        /*Enviar los  datos*/
        $revisar = getimagesize($_FILES['image']['tmp_name']);
        if ($revisar !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));

            $nombre=$_POST['nombre'];
            $apellido_p=$_POST['apellido_p'];
            $apellido_m=$_POST['apellido_m'];
            $lugar_nacimiento =$_POST['lugar_nacimiento'];
            $fecha_nacimiento=$_POST['fecha_nacimiento'];
            $id_categoria=$_POST['id_categoria'];
            $id_posicion=$_POST['id_posicion'];
            $id_cuerpo_tecnico=$_POST['id_cuerpo_tecnico'];
            $results = usuario::update_player($id, $nombre, $apellido_p, $apellido_m, $lugar_nacimiento, $fecha_nacimiento, $id_categoria, $id_posicion, $id_cuerpo_tecnico);
            header("Location: player_list.php");
            $mensaje = $results;
        }
    }
/*Cargar los datos al formulario */
require('components/player_edit_combo.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
<div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>
        <!--Hoja de estitlo para el formulario-->

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Editar a jugadores</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <!--Formulario para registrar al jugador-->
                <form action="player_edit.php?id_jugador=<?= $personas['id_jugador'];?>" class="formularios g-4 bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;" enctype="multipart/form-data">
                    <div class="col-12">
                        <input type="text" name="nombre" class="form-control" value="<?= $personas['nombre'];?>" >
                    </div>
                    <div class="col-12">
                        <input type="text" name="apellido_p" class="form-control" value="<?= $personas['ap_paterno'];?>" >
                    </div>
                    <div class="col-12">
                        <input type="text" name="apellido_m" class="form-control" value="<?= $personas['ap_materno'];?>">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="image" name="image" multiple>
                    </div>
                    <div class="col-12">
                        <input type="text" name="lugar_nacimiento" class="form-control" value="<?= $personas['lugar_nac'];?>">
                    </div>
                    <div class="col-12">
                        <input type="date" name="fecha_nacimiento" class="form-control" value="<?= $personas['fecha_nac'];?>" >
                    </div>
                    <div class="col-12">
                        <?php echo $combo1 ?>
                    </div>
                    <div class="col-12">
                        <?php echo $combo2 ?>
                    </div>
                    <div class="col-12">
                    <?php echo $combo3 ?>
                    </div>
                    <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar" style="width:100%;">
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>
