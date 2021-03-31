<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR</title>
</head>
<body>
   -- FORMULARIO DE JUGADOR
   <?php 
        if(isset($_POST['enviar'])){
            $id_jugador='JD02';
            $nombre=$_POST['nombre'];
            $apellido_p=$_POST['apellido_p'];
            $apellido_m=$_POST['apellido_m'];
            $lugar_nacimiento =$_POST['lugar_nacimiento'];
            $fecha_nacimiento=$_POST['fecha_nacimiento'];
            $id_categoria=$_POST['id_categoria'];
            $id_examen=$_POST['id_examen'];
            $id_posicion=$_POST['id_posicion'];
            $id_cuerpo_tecnico=$_POST['id_cuerpo_tecnico'];

        /*FORMULARIO JUGADOR*/


            include("conexion.php");
            $sql="INSERT INTO jugador(id_jugador,nombre,ap_paterno,ap_materno,lugar_nac,fecha_nac,id_categoria01,id_examen01,id_posicion01,id_cuerpo_tecnico01)
             VALUES('".$id_jugador."','".$nombre."','".$apellido_p."','".$apellido_m."','".$lugar_nacimiento."',
             '".$fecha_nacimiento."','".$id_categoria."','".$id_examen."','".$id_posicion."', '".$id_cuerpo_tecnico."')";

            $resultado=mysqli_query($conexion,$sql);
                if($resultado){
                    echo "<script language='JavaScript'>
                    alert('Los datos fueron guardados exitosamente en la DB')
                    location.assing('index.php');
                    </script>";
                }else{
                     echo "<script language='JavaScript'>
                    alert('Erorr: Los datos NO fueron guardados exitosamente en la DB');
                    location.assing('index.php');
                    </script>";
                }
                mysqli_close($conexion);
        }
    ?>
    <h1>Agregar Usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Email</label>
        <input type="email" name="email"><br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    
    </form>
</body>
</html>