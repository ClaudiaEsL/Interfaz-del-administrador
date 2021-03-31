<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Formulario De Psicologico</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
<body>

	 <?php 
        if(isset($_POST['enviar'])){
            $id_jugador=['id_jugador'];
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
            $sql="INSERT INTO jugador(id_jugador,nombre,ap_paterno,ap_materno,lugar_nac,fecha_nac,id_categoria01,
             id_examen01,id_posicion01,id_cuerpo_tecnico01)VALUES('".$id_jugador."','".$nombre."','".$apellido_p."',
             '".$apellido_m."','".$lugar_nacimiento."','".$fecha_nacimiento."','".$id_categoria."','".$id_examen."',
             '".$id_posicion."', '".$id_cuerpo_tecnico."')";

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
				<input type="text" name="id_jugador" placeholder="Id_jugador">
				<input type="text" name="nombre" placeholder="Nombre">
				<input type="text" name="apellido_p" placeholder="Apellido Paterno">
				<input type="text" name="apellido_m" placeholder="Apellido Materno">
				<input type="text" name="lugar_nacimiento" placeholder="Lugar De Nacimineto">
				<input type="date" name="fecha_nacimiento" placeholder="Fehca de nacimiento">
				<input type="text" name="id_categoria" placeholder="Categoria">
				<input type="text" name="id_examen" placeholder="Examen">
				<input type="text" name="id_posicion" placeholder="Posicion">
				<input type="text" name="id_cuerpo_tecnico" placeholder="Entrenador">

				<ul class="error" id="error"></ul>
			</div>

			<input type="submit" class="btn" name="enviar" value="Enviar">
		</form>



		<script src="formulario.js"></script>
</body>
</html>