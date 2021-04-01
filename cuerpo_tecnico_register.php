<?php
    require 'components/verify_sesion.php';

    /*Registrar nuevos usuarios*/
    if(isset($_POST['nombre']) && isset($_POST['fech_nac']) && isset($_POST['ci']) && isset($_POST['tel']) && isset($_POST['fech_con']) && isset($_POST['cargo'])){
        $mensaje = usuario::agregar_personal($_POST['nombre'],$_POST['fech_nac'], $_POST['ci'], $_POST['tel'], $_POST['fech_con'], $_POST['cargo'] );
    }
    /*Cargar datos del cuerpo tecnico*/
    $records = $conn->prepare("SELECT id_cargo, nombre FROM cargo");
    $records->execute();
    $datos = $records->get_result()->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
<div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Registrar al cuerpo tecnico</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <form class="formularios row g-4 bg-light" method="POST" action="cuerpo_tecnico_register.php" style="margin-top:1%;">
                    <div class="col-12">
                        <label for="inputname" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="inputname" name="nombre" required autofocus>
                    </div>
                    <div class="col-md-6 ">
                        <label for="inputfn" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="inputfn" name="fech_nac"  required>
                    </div>
                    <div class="col-md-6">
                    <label for="inputci" class="form-label">CI:</label>
                        <input type="text" class="form-control" id="inputci" name="ci"  required >
                    </div>
                    <div class="col-12">
                        <label for="inputtel" class="form-label">Telefono:</label>
                        <input type="number" class="form-control" id="inputtel" name="tel" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputc" class="form-label">Fecha de contratacion:</label>
                        <input type="date" class="form-control" id="inputc" name="fech_con" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputcargo" class="form-label">Cargo:</label><br>
                        <select name="cargo" id="inputcargo" required >
                        <?php
                            $consulta =  mysqli_query($conn,"SELECT id_cargo, nombre FROM cargo");
                            while($personas = mysqli_fetch_array($consulta)){
                        ?>
                            <option  value="<?= $personas['id_cargo']?>"><?= $personas['nombre']?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div id="editar" class="col-md-6">
                        <input type="submit" class="btn btn-primary" value = "Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>