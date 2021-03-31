     <?php
    include("conexion.php");
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['enviar'])) {

            $id_jugador=$_POST['id_jugador'];
            $nombre=$_POST['nombre'];
            $apellido_p=$_POST['apellido_p'];
            $apellido_m=$_POST['apellido_m'];
            $lugar_nacimiento =$_POST['lugar_nacimiento'];
            $fecha_nacimiento=$_POST['fecha_nacimiento'];
            $id_categoria=$_POST['id_categoria'];
            $id_examen=$_POST['id_examen'];
            $id_posicion=$_POST['id_posicion'];
            $id_cuerpo_tecnico=$_POST['id_cuerpo_tecnico'];

            $sql= "update jugador set  nombre='".$nombre."',ap_paterno='".$apellido_p."', ap_materno='".$apellido_m."' ,
                lugar_nac='".$lugar_nacimiento."' , fecha_nac='".$fecha_nacimiento."' , id_categoria01='".$id_categoria."' ,
                id_examen01='".$id_examen."', id_posicion01='".$id_posicion."', id_cuerpo_tecnico01='".$id_cuerpo_tecnico."'
                where id_jugador='".$id_jugador."' ";
               
                $resultado=mysqli_query($conexion,$sql);

                if($resultado){
                    echo "<script language='JavaScript'>
                    alert('Los datos fueron ACTUALIZADOS exitosamente en la DB')
                    location.assing('index.php');
                    </script>";
                }else{
                     echo "<script language='JavaScript'>
                    alert('Erorr: Los datos NO fueron ACTUALIZADOS exitosamente en la DB');
                    location.assing('index.php');
                    </script>";
                }
                
                mysqli_close($conexion);


    }else{

        $id_jugador=$_GET['id_jugador'];
        $sql= "SELECT * FROM jugador WHERE id_jugador='".$id_jugador."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado);           
            $nombre=$fila["nombre"];
            $apellido_p=$fila["ap_paterno"];
            $apellido_m=$fila["ap_materno"];
            $lugar_nacimiento =$fila["lugar_nac"];
            $fecha_nacimiento=$fila["fecha_nac"];
            $id_categoria=$fila["id_categoria01"];
            $id_examen=$fila["id_examen01"];
            $id_posicion=$fila["id_posicion01"];
            $id_cuerpo_tecnico=$fila["id_cuerpo_tecnico01"];

        mysqli_close($conexion);
    ?>
        <div class="contenedor">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="contenedor-inputs">
                    <input type="text" name="id_jugador" type="hidden" value="<?php echo $id_jugador; ?>">
                    <input type="text" name="nombre"  value="<?php echo $nombre; ?>">
                    <input type="text" name="apellido_p"  value="<?php echo $apellido_p; ?>">
                    <input type="text" name="apellido_m"  value="<?php echo $apellido_m; ?>">
                    <input type="text" name="lugar_nacimiento"  value="<?php echo $lugar_nacimiento; ?>">
                    <input type="date" name="fecha_nacimiento"  value="<?php echo $fecha_nacimiento; ?>">
                    <input type="text" name="id_categoria"  value="<?php echo $id_categoria; ?>">
                    <input type="text" name="id_examen"  value="<?php echo $id_examen; ?>">
                    <input type="text" name="id_posicion"  value="<?php echo $id_posicion; ?>">
                    <input type="text" name="id_cuerpo_tecnico"  value="<?php echo $id_cuerpo_tecnico; ?>">

                    <ul class="error" id="error"></ul>
                </div>

                <input type="submit" class="btn" name="enviar" value="Actualizar">
            </form>
    <?php
    }
    ?>
   <script src="formulario.js"></script>
</body>
</html>