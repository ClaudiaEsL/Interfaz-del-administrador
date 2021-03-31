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
            $id_fisico=['id_fisico'];
            $estatura=$_POST['estatura'];
            $peso=$_POST['peso'];
            $pulso=$_POST['pulso'];
            $tension_arterial =$_POST['tension_arterial'];
            $control_vista =$_POST['control_vista'];
            $postura =$_POST['postura'];
            $articulaciones =$_POST['articulaciones'];
            $resistencia =$_POST['resistencia'];
            $flexibilidad =$_POST['flexibilidad'];

        /*FORMULARIO JUGADOR*/


            include("conexion.php");
            $sql="INSERT INTO fisico(id_fisico,estatura,peso,pulso,tension_arterial,control_vista,postura,
             articulaciones,resistencia,flexibilidad)VALUES('".$id_fisico."','".$estatura."','".$peso."',
             '".$pulso."','".$tension_arterial."','".$control_vista."','".$postura."','".$articulaciones."',
             '".$resistencia."', '".$flexibilidad."')";

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
				<input type="text" name="id_fisico" placeholder="ID_FISICO">
				<input type="text" name="estatura" placeholder="Estatura">
				<input type="text" name="peso" placeholder="Peso">
				<input type="text" name="pulso" placeholder="Pulso">
				<input type="text" name="tension_arterial" placeholder="Tension Arterial">
				<input type="text" name="control_vista" placeholder="Control de Vista">
				<input type="text" name="postura" placeholder="Postura">
				<input type="text" name="articulaciones" placeholder="Articulaciones">
				<input type="text" name="resistencia" placeholder="Resistencia">
				<input type="text" name="flexibilidad" placeholder="Flexibilidad">

				<ul class="error" id="error"></ul>
			</div>

			<input type="submit" class="btn" name="enviar" value="Enviar">
		</form>



		<script src="formulario.js"></script>
</body>
</html>