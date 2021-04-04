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
            
            $enfermedades_f=$_POST['enfermedades_f'];
            $enfermedades=$_POST['enfermedades'];
            $cirugias=$_POST['cirugias'];
			$alergias=$_POST['alergias'];
			$lesiones=$_POST['lesiones'];
            $medicamentos =$_POST['medicamentos'];
            $id_preparador =$_POST['preparador'];

        /*FORMULARIO JUGADOR*/


            include("conexion.php");
			

            $sql="INSERT INTO antecedente_medico (enfermedades_flia,enfermedades,cirugias,alergias,lesiones,medicamentos,id_preparador_fisico03)
			VALUES('".$enfermedades_f."','".$enfermedades."','".$cirugias."','".$alergias."','".$lesiones."',
             '".$medicamentos."','".$id_preparador."')";

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
				<input type="text" name="enfermedades_f" placeholder="Enfermedades Familiares">
				<input type="text" name="enfermedades" placeholder="Enfermedades">
				<input type="text" name="cirugias" placeholder="Cirugias">
				<input type="text" name="alergias" placeholder="Alergias">
				<input type="text" name="lesiones" placeholder="lesiones">
				<input type="text" name="medicamentos" placeholder="Medicamentos">
				
				
				<label for="inputespecialista" class="form-label">Categoria:</label><br>
                        <select name="preparador" id="inputcargo" required >
                        <?php
                        include("conexion.php");
                            $consulta =  mysqli_query($conexion,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico WHERE id_cargo01='3'");
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