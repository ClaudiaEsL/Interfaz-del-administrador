<?php
    require 'components/verify_sesion.php';
    /*Clase para las consultas*/
    include ("php/consultas.php");
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
        $encontrado = consultas::ver_datos($id);
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
                <div class="text-center" style="height:500px;width: 100%;display: flex; justify-content:center;">
                    <div class="border" style="display:flex;padding:1;max-width: 600px;max-height:400px;text-align:center;">
                        <?php echo '<img width="300px" class="rounded float-start"  src="data:image/jpeg;base64,'.base64_encode($encontrado["fotografia"]).'"/>';?>
                        <div class="card-body bg-light">
                            <h5 class="card-title"><?= $encontrado['jugador'];?> </h5>
                            <p class="card-text">Posicion: <?= $encontrado['posicion'];?> </p>
                            <p class="card-text">Categoria: <?= $encontrado['categoria'];?> </p>
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