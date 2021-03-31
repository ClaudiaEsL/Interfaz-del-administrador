<?php
    require 'components/verify_sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>

<body>
    <div class="content">

        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion"><?php require 'components/sesion.php';?></div>

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Cuerpo de tecnico</h3>
            <div class="container" style="display:flex;justify-content:center;">
                <table class="table table-striped table-hover"  style="max-width: 90%;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id = $user['nombre'];
                            $consulta =  mysqli_query($conn,"SELECT nombre, id_cuerpo_tecnico, usuario, email FROM cuerpo_tecnico WHERE nombre != '$id'");
                            while($personas = mysqli_fetch_array($consulta)){
                        ?>
                         <tr>
                            <th><?= $personas['id_cuerpo_tecnico']?></th>
                            <td><?= $personas['nombre']?></td>
                            <td><?= $personas['usuario']?></td>
                            <td><?= $personas['email']?></td>
                            <td><button class="btn btn-danger"><?php echo "<a href='delete_register.php?id=".$personas['id_cuerpo_tecnico']."' onclick='return confirmar()' >Eliminar</a>"; ?></button></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require 'components/footer.php';?>
    <?php require 'components/scripts.php'; ?>
    <script>
        function confirmar(){
            return confirm('Esta seguro que desea eliminar permanentemente el registro?');
        }
    </script>
</body>
</html>