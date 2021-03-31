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
            <div class="container">
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Lugar de Nacimineto</th>
                            <th>Fecha de nacimiento</th>
                            <th>Categoria</th>
                            <th>Examenes</th>
                            <th>Posicion</th>
                            <th>Entrenador</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM  jugador";
                        $resultado = mysqli_query($conn,$sql);
                        while ($filas = mysqli_fetch_assoc($resultado)) {
                    ?>
                         <tr>
                            <th><?php echo $filas['id_jugador'] ?></th>
                            <th><?php echo $filas['nombre'] ?></th>
                            <th><?php echo $filas['ap_paterno'] ?></th>
                            <th><?php echo $filas['ap_materno'] ?></th>
                            <th><?php echo $filas['lugar_nac'] ?></th>
                            <th><?php echo $filas['fecha_nac'] ?></th>
                            <th><?php echo $filas['id_categoria01'] ?></th>
                            <th><?php echo $filas['id_examen01'] ?></th>
                            <th><?php echo $filas['id_posicion01'] ?></th>
                            <th><?php echo $filas['id_cuerpo_tecnico01'] ?></th>
                            <th>
                            <?php echo "<a class='btn btn-warning' style='width:100%;color:white;' href='player_edit.php?id_jugador=".$filas['id_jugador']."'>EDITAR</a>"; ?>
                            <?php echo "<a class='btn btn-danger' style='width:100%;color:white;' href='player_delete.php?id_jugador=".$filas['id_jugador']."' onclick='return confirmar()' >ELIMINAR</a>"; ?>
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