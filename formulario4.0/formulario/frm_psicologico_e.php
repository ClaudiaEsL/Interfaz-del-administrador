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
            $id_psicologico=$_POST['id_psicologico'];
            $eleccion=$_POST['eleccion'];
            $rapidez=$_POST['rapidez'];
            $efect_tactica_mental=$_POST['efect_tactica_mental'];
            $observaciones =$_POST['observaciones'];
            $id_especialista =$_POST['especialista'];


            $sql= "update psicologico set  eleccion='".$eleccion."',rapidez='".$rapidez."', efect_tactica_mental='".$efect_tactica_mental."' ,
                observaciones='".$observaciones."' , id_especialista02='".$id_especialista."' 
                where id_psicologico='".$id_psicologico."' ";
               
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

        $id_psicologico=$_GET['id_psicologico'];
        $sql= "SELECT * FROM psicologico WHERE id_psicologico='".$id_psicologico."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado); 

            $eleccion=$fila['eleccion'];
            $rapidez=$fila['rapidez'];
            $efect_tactica_mental=$fila['efect_tactica_mental'];
            $observaciones =$fila['observaciones'];
            $id_especialista =$fila['especialista'];

        mysqli_close($conexion);
    ?>
        <div class="contenedor">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="contenedor-inputs">

                    <input type="text" name="eleccion"  value="<?php echo $eleccion; ?>">
				    <input type="text" name="rapidez" value="<?php echo $rapidez; ?>">
				    <input type="text" name="efect_tactica_mental" value="<?php echo $efect_tactica_mental; ?>">
                    <input type="text" name="observaciones" value="<?php echo $observaciones ; ?>">
				    
                    <label for="inputespecialista" class="form-label">Categoria:</label><br>
                        <select name="especialista" value="<?php echo $id_especialista ; ?>" required >
                        <?php
                        include("conexion.php");
                            $consulta =  mysqli_query($conexion,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico WHERE id_cargo01='4'");
                            while($datos = mysqli_fetch_array($consulta)){
                        ?>
                            <option  value="<?= $datos['id_cuerpo_tecnico']?>"><?= $datos['nombre']?></option>
                        <?php
                            }
                        ?>
                        </select>

                    <input type="hidden" name="id_psicologico" value="<?php echo $id_psicologico; ?>">

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