<?php
    require 'components/verify_sesion.php';

    /*Registrar nuevos usuarios*/
    if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['id']) && isset($_POST['cargo'])){
        $mensaje = usuario::agregar_usuarios($_POST['nombre'],$_POST['email'], $_POST['usuario'], $_POST['contraseña'], $_POST['id'], $_POST['cargo'] );
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

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Registrar nuevo usuario</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <form class="formularios row g-4 bg-light" method="POST" action="register_users.php" style="margin-top:1%;">
                    <div class="col-md-6">
                        <label for="inputcargo" class="form-label">Lista de jugadores:</label><br>
                        <select name="cargo" id="inputcargo" required >
                        <?php
                            $consulta =  mysqli_query($conn,"SELECT id_jugador, nombre FROM jugador");
                            while($personas = mysqli_fetch_array($consulta)){
                        ?>
                            <option  value="<?= $personas['id_jugador']?>"><?= $personas['nombre']?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div id="editar" class="col-md-6">
                        <input type="submit" class="btn btn-primary" value = "Elegir jugador">
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