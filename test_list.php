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
            <div class="container" style="display:flex;justify-content:center;">
                <table id="tabla" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" >ID</th>
                            <th scope="col" >Nombre</th>
                            <th scope="col" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id_jugador, concat(nombre,' ', ap_paterno, ' ', ap_materno) nombre FROM jugador;";
                        $resultado = mysqli_query($conn,$sql);
                        while ($filas = mysqli_fetch_assoc($resultado)) {
                        ?>
                         <tr>
                            <td><?=$filas['id_jugador'] ?></th>
                            <td><?=$filas['nombre'] ?></th>
                            <th style="width: 10%;display:flex;">
                            <?php echo "<a title=Ver test' class='btn btn-success' style='color:white; margin-left:1%;' href='test_register.php?id_jugador=".$filas['id_jugador']."'>Registrar test</a>"; ?>
                            <?php echo "<a title='Editar test' class='btn btn-primary' style='color:white; margin-left:1%;' href='test_edit.php?id_jugador=".$filas['id_jugador']."' onclick='return confirmar()' >Editar test</a>"; ?>
                            </th>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>