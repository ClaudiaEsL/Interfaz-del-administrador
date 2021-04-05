<?php
    require 'components/verify_sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>

<body>
    <div class="content">

        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Cuerpo de tecnico</h3>
            <div class="container" style="display:flex;justify-content:center;">
                <table id="tabla" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">rol</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id = $user['id_usuario'];
                            $consulta =  mysqli_query($conn,"SELECT * FROM usuario WHERE id_usuario != '$id'");
                            while($personas = mysqli_fetch_array($consulta)){
                        ?>
                         <tr>
                            <th><?= $personas['id_usuario']?></th>
                            <td><?= $personas['nombre']?></td>
                            <td><?= $personas['usuario']?></td>
                            <td><?= $personas['email']?></td>
                            <td><?= $personas['id_rol01']?></td>
                            <td><button class="btn btn-danger"><?php echo "<a href='delete_register.php?id=".$personas['id_usuario']."' onclick='return confirmar()' >Eliminar</a>"; ?></button></td>
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