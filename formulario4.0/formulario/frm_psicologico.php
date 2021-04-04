<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Formulario DE TEST FISICO</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
<body>

	 <?php 
        if(isset($_POST['enviar'])){
            
            $eleccion=$_POST['eleccion'];
            $rapidez=$_POST['rapidez'];
            $efect_tactica_mental=$_POST['efect_tactica_mental'];
            $observaciones =$_POST['observaciones'];
            $id_especialista =$_POST['especialista'];

        /*FORMULARIO JUGADOR*/


            include("conexion.php");
			

            $sql="INSERT INTO psicologico(eleccion,rapidez,efect_tactica_mental,observaciones,id_especialista02)
			VALUES('".$eleccion."','".$rapidez."','".$efect_tactica_mental."',
             '".$observaciones."','".$id_especialista."')";

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

    <div class="contenedor">
		<form action="<?=$_SERVER['PHP_SELF']?>" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
				<input type="text" name="eleccion" placeholder="Eleccion">
				<input type="text" name="rapidez" placeholder="Rapidez">
				<input type="text" name="efect_tactica_mental" placeholder="E. Tactica Mental">
				<input type="text" name="observaciones" placeholder="Observaciones">
				
				<label for="inputespecialista" class="form-label">Categoria:</label><br>
                        <select name="especialista" id="inputcargo" required >
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

				<ul class="error" id="error"></ul>
			</div>

			<input type="submit" class="btn" name="enviar" value="Enviar">
		</form>



		<script src="formulario.js"></script>
</body>
</html>