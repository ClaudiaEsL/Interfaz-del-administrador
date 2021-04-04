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


            $id_antecedente=$_POST['id_antecedente'];
            $enfermedades_f=$_POST['enfermedades_f'];
            $enfermedades=$_POST['enfermedades'];
            $cirugias=$_POST['cirugias'];
			$alergias=$_POST['alergias'];
			$lesiones=$_POST['lesiones'];
            $medicamentos =$_POST['medicamentos'];
            $id_preparador =$_POST['preparador'];



            $sql= "update antecedente_medico set  enfermedades_flia='".$enfermedades_f."',enfermedades='".$enfermedades."',
            cirugias='".$cirugias."',alergias='".$alergias."',lesiones='".$lesiones."',medicamentos='".$medicamentos."',
            id_preparador_fisico03='".$id_preparador."'  where id_antecedente='".$id_antecedente."' ";
               
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

        $id_antecedente=$_GET['id_antecedente'];
        $sql= "SELECT * FROM antecedente_medico WHERE id_antecedente='".$id_antecedente."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado); 

            $enfermedades_f=$fila['enfermedades_flia'];
            $enfermedades=$fila['enfermedades'];
            $cirugias=$fila['cirugias'];
			$alergias=$fila['alergias'];
			$lesiones=$fila['lesiones'];
            $medicamentos =$fila['medicamentos'];
            $id_preparador =$fila['preparador'];

        mysqli_close($conexion);
    ?>
        <div class="contenedor">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="contenedor-inputs">

                    <input type="text" name="enfermedades_f"  value="<?php echo $enfermedades_f; ?>">
				    <input type="text" name="enfermedades" value="<?php echo $enfermedades; ?>">
                    <input type="text" name="cirugias" value="<?php echo $cirugias; ?>">
                    <input type="text" name="alergias" value="<?php echo $alergias; ?>">
				    <input type="text" name="lesiones" value="<?php echo $lesiones; ?>">
                    <input type="text" name="medicamentos" value="<?php echo $medicamentos ; ?>">
				    
                    <label for="inputespecialista" class="form-label">Categoria:</label><br>
                        <select name="preparador" value="<?php echo $id_especialista ; ?>" required >
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

                    <input type="hidden" name="id_antecedente" value="<?php echo $id_antecedente; ?>">

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