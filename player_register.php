<?php
    require 'components/verify_sesion.php';

    /*Registrar nuevos usuarios*/
    if(isset($_POST['enviar'])){
        if(getimagesize($_FILES['image']['tmp_name'])){
            $revisar = getimagesize($_FILES['image']['tmp_name']);
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));
            if($revisar !== false){
            
                $nombre=$_POST['nombre'];
                $apellido_p=$_POST['apellido_p'];
                $apellido_m=$_POST['apellido_m'];
                $lugar_nacimiento =$_POST['lugar_nacimiento'];
                $fecha_nacimiento=$_POST['fecha_nacimiento'];
                $id_categoria=$_POST['id_categoria'];
                $id_posicion=$_POST['id_posicion'];
                $id_cuerpo_tecnico=$_POST['id_cuerpo_tecnico'];
    
                /*FORMULARIO JUGADOR*/
                
                $records = $conn->prepare("INSERT INTO `jugador` (`id_jugador`, `nombre`, `ap_paterno`, `ap_materno`, 
                `fotografia`, `lugar_nac`, `fecha_nac`, `id_categoria01`, `id_posicion01`, `id_director_tecnico01`) 
                VALUES (NULL, '$nombre', '$apellido_p', '$apellido_m', '$imgContenido', 
                '$lugar_nacimiento', '$fecha_nacimiento', '$id_categoria', '$id_posicion', '$id_cuerpo_tecnico')");
                if($records-> execute()){
                    $mensaje =  "Los datos fueron guardados con exito";
                }
                else{
                    $mensaje =  "Los datos no fueron guardados. Intentelo nuevamente";
                }
            }
        }
        else{
            $mensaje = "Ingrese una imagen";
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

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Registrar a un nuevo jugador</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <!--Formulario para registrar al jugador-->
                <form action="<?=$_SERVER['PHP_SELF']?>" class="formularios row g-4 bg-light" id="formulario" name="formulario" method="POST" style="margin-top:1%;" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Nombres:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese los nombres"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Apellido paterno:</label>
                            <input type="text" name="apellido_p" class="form-control" placeholder="Ingrese el apellido paterno"  required>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputEmail" class="form-label">Apellido materno:</label>
                            <input type="text" name="apellido_m" class="form-control" placeholder="Ingrese el apellido materno"  required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-around">
                        <div class="col-md-12 ">
                            <label for="inputEmail" class="form-label">Imagen del jugador:</label>
                            <input type="file" class="form-control" id="image" name="image" multiple required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="inputEmail" class="form-label">Lugar de nacimiento:</label>
                            <input type="text" name="lugar_nacimiento" class="form-control" placeholder="Pais, Ciudad"  required>
                        </div>
                        <div class="col-md-6 ">
                            <label for="inputEmail" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="inputcargo" class="form-label">Categoria:</label><br>
                            <select class="form-select form-select-sm"  name="id_categoria" id="inputcargo" required >
                            <option  value="" disabled selected>-Seleccione una opción-</option>
                            <?php
                                $consulta1 =  mysqli_query($conn,"SELECT id_categoria, nombre FROM categoria");
                                while($categoria = mysqli_fetch_array($consulta1)){
                            ?>
                                <option  value="<?= $categoria['id_categoria']?>"><?= $categoria['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputcargo" class="form-label">Posición:</label><br>
                            <select class="form-select form-select-sm"  name="id_posicion" id="inputcargo" required>
                            <option  value="" disabled selected>-Seleccione una opción-</option>
                            <?php
                                $consulta2 =  mysqli_query($conn,"SELECT id_pocision, nombre FROM posicion");
                                while($posicion = mysqli_fetch_array($consulta2)){
                            ?>
                                <option  value="<?= $posicion['id_pocision']?>"><?= $posicion['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 ">
                            <label for="inputcargo" class="form-label">Entrenadores registrados:</label><br>
                            <select class="form-select form-select-sm"  name="id_cuerpo_tecnico" id="inputcargo" required >
                            <option  value="" disabled selected>-Seleccione una opción-</option>
                            <?php
                                $consulta3 =  mysqli_query($conn,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico WHERE id_cargo01 = '1'");
                                while($entrenador = mysqli_fetch_array($consulta3)){
                            ?>
                                <option  value="<?= $entrenador['id_cuerpo_tecnico']?>"><?= $entrenador['nombre']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div><br>
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
