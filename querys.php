<?php
    require 'components/verify_sesion.php';

    /*Cargar datos del cuerpo tecnico*/
    $records = $conn->prepare("SELECT id_cargo, nombre FROM cargo");
    $records->execute();
    $datos = $records->get_result()->fetch_assoc();
    /*update dates*/
    $mensaje ="";
    $verificacion ='' ;
    if(isset($_POST['buscar']))
    {
        $verificacion = "El usuario fue encontrado";
        $id = $_POST['buscar'];
        $encontrado = usuario::search($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
<div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Buscar jugadores</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            <!---->
            <div class="container" style="display: flex; justify-content:center;">
                <form class="row g-4 bg-light text-center" method="POST" action="querys.php" style="margin-top:1%;">
                    <div class="col-md-6">
                        <select class="form-select form-select-sm" name="buscar" id="inputpersonas" required >
                        <?php
                            /*Cargar datos de jugadores*/
                            $consulta =  mysqli_query($conn,"SELECT id_jugador, nombre FROM jugador");
                            while($personas = mysqli_fetch_array($consulta)){
                        ?>
                            <option value="<?= $personas['id_jugador']?>"><?= $personas['nombre']?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value = "Buscar jugador">
                    </div>
                </form>
            </div>
            <!--Campo para mostrar los datos-->
            <?php if(empty($verificacion)):?>
                <div class="container text-center">
                    <img src="img/icon/search.jpg" alt="" width="150px">
                    <p>Busque un dato</p>
                </div>
            <?php
            else:?>
                <div class="text-center tarjeta" style="height:500px;width: 100%;display: flex; justify-content:center;">
                    <div class="card bg-secondary" style="max-width: 500px;max-height:100px;text-align:center;">
                    <?php echo '<img class="card-img-top"" src="data:image/jpeg;base64,'.base64_encode($encontrado["imagen"]).'"/>';?>
                        <div class="card-body ">
                            <h5 class="card-title"><?= $encontrado['nombre'];?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ver examenes</a>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php require 'components/footer.php'; ?>
    <?php require 'components/scripts.php'; ?>
</body>
</html>