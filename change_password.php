<?php 
    require 'components/verify_sesion.php';
    /*Cambiar contraseña*/
    $mensaje = "";
    /*Si el campo de las contraseñas no esta vacio*/
    if(!empty($_POST['newpassword']) && !empty($_POST['passwordagain']) ){
        if($_POST['newpassword'] == $_POST['passwordagain']){
            $id = $_SESSION['id'];
            $cambio = usuario::cambiar_password($_POST['newpassword'],$id);
            if($cambio == true){
                $mensaje = "Cambio de contraseña realizado exitosamente";
            }
            else{
                $mensaje = "Error al cambiar de contraseña. Intentelo de nuevo";
            }
        }
        else{
            $mensaje = "Las contraseñas no coinciden. Intentelo de nuevo";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<?php require('components/head.php'); ?>
<body>
    <div class="content">
        <div class="contenedor-menu" id="menu"><?php require 'components/menu.php';?></div>
        <div class="contenido"><div class="sesion d-flex"><?php require 'components/sesion.php';?></div>
            <h3 class="text-center" style="font-size: 18px;margin-top:1%;">Mis datos</h3>
            <!--Mensaje de registro-->
            <?php require 'components/mensaje_registro.php';?>
            
            <div class="container" style="display: flex; justify-content:center;">
                <form class="row g-3" method="POST" action="change_password.php">
                    <div class="col-12">
                        <label for="txtPassword" class="form-label">Contraseña nueva</label>
                        <div class="input-group">
                            <input id="txtPassword" type="Password" Class="form-control" name="newpassword">
                            <div class="input-group-append">
                                <button id="show_password" class="btn bg-dark" style="color:white;" type="button" onclick="mostrarPassword()"> 
                                <i id="icono" class=" icono bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="passwordagain" class="form-label">Repite la contraseña</label>
                        <input type="password" class="form-control" id="passwordagain" name="passwordagain">
                    </div>
                    <div class="col-md-6">
                        <a href="my_account.php" type="button" class="btn btn-danger" >Cancelar</a>    
                        <button type="submit" class="btn btn-primary" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'components/footer.php';?>
    <?php require 'components/scripts.php'; ?>
</body>
</html>