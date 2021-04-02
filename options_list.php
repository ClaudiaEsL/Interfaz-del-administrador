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

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Administrar datos</h3>
            <div id="container" class="d-flex justify-content-center flex-wrap">
                <table id="tabla-opciones" class="table table-striped table-hover p-2 border caption-top overflow-auto " >
                    <caption class="bg-primary text-light px-2">Lista de roles registrados</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta =  mysqli_query($conn,"SELECT * FROM rol");
                            while($roles = mysqli_fetch_array($consulta)){
                        ?>
                         <tr>
                            <th><?= $roles['id_rol']?></th>
                            <td><?= $roles['nombre']?></td>
                            <td><button class="btn btn-danger"><?php echo "<a href='delete_register.php?id=".$roles['id_rol']."' onclick='return confirmar()' >Eliminar</a>"; ?></button></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <table id="tabla-opciones" class="table table-striped table-hover p-2 border caption-top">
                    <caption class="bg-primary text-light px-2">Lista de categorias registrados</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta =  mysqli_query($conn,"SELECT * FROM categoria");
                            while($categorias = mysqli_fetch_array($consulta)){
                        ?>
                         <tr>
                            <th><?= $categorias['id_categoria']?></th>
                            <td><?= $categorias['nombre']?></td>
                            <td><button class="btn btn-danger"><?php echo "<a href='delete_register.php?id=".$categorias['id_categoria']."' onclick='return confirmar()' >Eliminar</a>"; ?></button></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <table id="tabla-opciones" class="table table-striped table-hover p-2 border caption-top">
                    <caption class="bg-primary text-light px-2">Lista de posiciones registradas</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta =  mysqli_query($conn,"SELECT * FROM posicion");
                            while($posiciones = mysqli_fetch_array($consulta)){
                        ?>
                         <tr>
                            <th><?= $posiciones['id_pocision']?></th>
                            <td><?= $posiciones['nombre']?></td>
                            <td><button class="btn btn-danger"><?php echo "<a href='delete_register.php?id=".$posiciones['id_pocision']."' onclick='return confirmar()' >Eliminar</a>"; ?></button></td>
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