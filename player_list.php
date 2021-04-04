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

        <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Jugadores registrados</h3>
            <div class="container" style="width:100%;">
                <table id="tabla" class="table table-striped table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col" >ID</th>
                            <th scope="col" >Nombre</th>
                            <th scope="col" >Apellido Paterno</th>
                            <th scope="col" >Apellido Materno</th>
                            <th scope="col" >Lugar de Nacimineto</th>
                            <th scope="col" >Fecha de nacimiento</th>
                            <th scope="col" >Categoria</th>
                            <th scope="col" >Posicion</th>
                            <th scope="col" >Entrenador</th>
                            <th scope="col" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM  jugador";
                        $resultado = mysqli_query($conn,$sql);
                        while ($filas = mysqli_fetch_assoc($resultado)) {
                        ?>
                         <tr>
                            <th><?=$filas['id_jugador'] ?></th>
                            <td><?=$filas['nombre'] ?></th>
                            <td><?=$filas['ap_paterno'] ?></th>
                            <td><?=$filas['ap_materno'] ?></th>
                            <td><?=$filas['lugar_nac'] ?></th>
                            <td><?=$filas['fecha_nac'] ?></th>
                            <td><?=$filas['id_categoria01'] ?></th>
                            <td><?=$filas['id_posicion01'] ?></th>
                            <td><?=$filas['id_director_tecnico01'] ?></th>
                            <th>
                            <?php echo "<a title='Editar registro' class='btn btn-warning' style='color:white; margin-left:1%;' href='player_edit.php?id_jugador=".$filas['id_jugador']."'><i class='bi bi-pencil-square'></i></a>"; ?>
                            <?php echo "<a title='Eliminar registro' class='btn btn-danger' style='color:white; margin-left:1%;' href='player_delete.php?id_jugador=".$filas['id_jugador']."' onclick='return confirmar()' ><i class='bi bi-trash-fill'></i></a>"; ?>
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
    <?php require 'components/footer.php';?>
    <?php require 'components/scripts.php'; ?>
    <script>
        function confirmar(){
            return confirm('Esta seguro que desea eliminar permanentemente el registro?');
        }
    </script>
</body>
</html>