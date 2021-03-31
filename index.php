<?php
session_start();

/*  Conexion a la base de datos*/
require 'php/conexion.php';

/*Clase para el usuario*/
include ("php/usuario.php");
/*Verificacion si tiene la sesion iniciada*/
if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    $results = usuario::get($id);

    /*Variable 'user'  donde guardaremos los datos del usuario*/
    $user = NULL;
    /*Verificar si el usuario esta registrado en la base de datos*/
    if(count($results)>0){
        $user = $results;
        header("Location: home.php");
    }

}
else{
    $mensaje = "";
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['password'];
        $stmt = $conn->prepare("SELECT email, usuario, contraseña, id_cuerpo_tecnico FROM cuerpo_tecnico WHERE usuario='$usuario' OR email = '$usuario'");
        $stmt->execute();
        if ($datos = $stmt->get_result()->fetch_assoc()) {
            $hash = $datos['contraseña'];
            $resultado = usuario::verificar_contraseña($contraseña, $hash);
            if($resultado == true){
                $_SESSION['id'] = $datos['id_cuerpo_tecnico'];
                header("Location: home.php");
            }
            else{
                $mensaje = "Contraseña incorrecta";
            }
        }
        else{
            $mensaje = "Usuario no encontrado";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles/login.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <?php
    if(!empty($_COOKIE['_cookietema'])) $menu = $_COOKIE['_cookietema'];
    if(empty($_COOKIE['_cookietema'])) $menu = "logo-index";
    ?>
    <link rel="stylesheet" href="css/styles/<?php echo $menu ?>.css" type="text/css" media="all">
    <title>Login</title>
</head>
<body style="background-image:url(./img/soccer-ball-going-into-net-goal-vector.jpg)">
    <?php
        require 'components/logo_index.php';
    ?>
    <div class="login">
        <div class="formulario">
            <div class="division">
                <form action="index.php" method="POST">
                    <div class="titulo">
                        <h6>Bienvenido, ingrese sus datos</h6>
                    </div>
                    <?php if(!empty($mensaje)):?>
                        <p class="mensajeform mb-5">
                            <?= $mensaje ?>
                        </p>
                    <?php endif;?>
                    <div class="mb-5">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" aria-describedby="inputGroupPrepend" required name="usuario" id="usuario" placeholder="Ingrese su usuario" required>
                            <div class="invalid-feedback">
                              Por favor introduzca un usuario
                            </div>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" aria-describedby="inputGroupPrepend" required name="password" id="password" placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">
                          Por favor introduzca su contraseña
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark" style="width:95%;">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php
        require 'components/footer.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>