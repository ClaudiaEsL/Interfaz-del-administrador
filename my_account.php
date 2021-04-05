<?php
    require 'components/verify_sesion.php';
     /*update dates*/
     $mensaje ="";
     if(!empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['email']))
     {
         /*actualizar datos*/
         $nombre =$_POST["nombre"];
         $usuario =$_POST["usuario"];
         $email =$_POST["email"];
         $id = $_SESSION['id'];
         $results = usuario::update($nombre, $usuario, $email, $id);
         header("Location: my_account.php");
         $mensaje = $results;
     }
?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
    <div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>

            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Mi cuenta</h3>
            <!--Mensaje de comprobacion-->
            <?php require 'components/mensaje_registro.php';?>
            <div class="container" style="display: flex; justify-content:center;margin-top:2%;">
                <form class="row g-3 bg-light" method="POST" action="my_account.php">
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" value="<?= $user['email']?>" disabled="" required>
                    </div>
                    <div class="col-md-6">
                    <label for="inputusuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="inputusuario" name="usuario" value="<?= $user['usuario']?>" disabled="" required>
                    </div>
                    <div class="col-12">
                        <label for="inputname" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputname" name="nombre" value="<?= $user['nombre']?>" disabled="" required>
                    </div>
                    <div class="col-12">
                        <a style="color:blue;" href="change_password.php">Cambiar contraseña</a>
                    </div>
                    <div class="col-md-6" id="editar-1">
                        <input type="button" class="btn btn-success" onclick="activar_formulario()" value = "Editar">
                    </div>
                    <div id="editar" class="col-md-6" style="display:none;">
                        <input type="button" class="btn btn-danger" onclick="desactivar_formulario()" value = "Cancelar">    
                        <input type="submit" class="btn btn-primary" value = "Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'components/footer.php';?>
    <?php require('components/scripts.php'); ?>
</body>
</html>
