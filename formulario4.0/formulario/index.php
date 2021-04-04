<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" href="estilo.css">
        <title>Formulario De Registro</title>
		<script type="text/javascript">
        function confirmar(){
            return confirm('Esta seguro que desea ELIMINAR los datos?');
        }
    	</script>
        
    </head>
    <body>

	 <?php 
    include ("conexion.php");
    $sql="SELECT * FROM  jugador";
    $resultado=mysqli_query($conexion,$sql);
    ?>
		<a href="frm_jugador.php">Agregar nuevo jugador</a>
		<h1>Lista de Jugadores</h1>
		<div class="tabla">
			<table>
			 	<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Lugar de Nacimineto</th>
						<th>Categoria</th>
						<th>Examenes</th>
						<th>Posicion</th>
						<th>Entrenador</th>
						<th>Acciones</th>
					</tr>
				 </thead>

				 <?php 
            while ($filas=mysqli_fetch_assoc($resultado)) {
                ?>
            <tr>
                <th><?php echo $filas['id_jugador'] ?></th>
                <th><?php echo $filas['nombre'] ?></th>
                <th><?php echo $filas['ap_paterno'] ?></th>
				<th><?php echo $filas['ap_materno'] ?></th>
				<th><?php echo $filas['lugar_nac'] ?></th>
				<th><?php echo $filas['fecha_nac'] ?></th>
				<th><?php echo $filas['id_categoria01'] ?></th>
				<th><?php echo $filas['id_examen01'] ?></th>
				<th><?php echo $filas['id_posicion01'] ?></th>
				<th><?php echo $filas['id_cuerpo_tecnico01'] ?></th>
                <th>
                
            	<?php echo "<a href='frm_jugador_e.php?id_jugador=".$filas['id_jugador']."'>EDITAR</a>"; ?>
                -
                <?php echo "<a href='frm_jugador_d.php?id_jugador=".$filas['id_jugador']."' onclick='return confirmar()' >ELIMINAR</a>"; ?>
                </th>
            </tr>
            <?php
            }
           ?>
        </tbody>
			</table>
			<br><br><br>


		//TABLA EXAMEN FISICO
			
		<?php 
    include ("conexion.php");
    $sql="SELECT * FROM  fisico";
    $resultado=mysqli_query($conexion,$sql);
    ?>
		<h1>Examen fisico</h1>
			<br><br>
			<a href="frm_fisico.php">Nuevo Registro</a>
		<div class="tabla">
			<table>
			 	<thead>
					<tr>
						<th>ID</th>
						<th>Estatura</th>
						<th>Peso</th>
						<th>Pulso</th>
						<th>Tension Arterial</th>
						<th>Control Vista</th>
						<th>Postura</th>
						<th>Articulaciones</th>
						<th>Resistencia</th>
						<th>Flexibilidad</th>
					</tr>
				 </thead>

				 <?php 
            while ($filas=mysqli_fetch_assoc($resultado)) {
                ?>
            <tr>
                <th><?php echo $filas['id_fisico'] ?></th>
                <th><?php echo $filas['estatura'] ?></th>
                <th><?php echo $filas['peso'] ?></th>
				<th><?php echo $filas['pulso'] ?></th>
				<th><?php echo $filas['tension_arterial'] ?></th>
				<th><?php echo $filas['control_vista'] ?></th>
				<th><?php echo $filas['postura'] ?></th>
				<th><?php echo $filas['articulaciones'] ?></th>
				<th><?php echo $filas['resistencia'] ?></th>
				<th><?php echo $filas['flexibilidad'] ?></th>
                <th>
                
                 <?php echo "<a href='frm_psicologico_e.php?id_psicologico=".$filas['id_psicologico']."'>EDITAR</a>"; ?>
                -
               <?php echo "<a href='frm_psicologico_d.php?id_psicologico=".$filas['id_psicologico']."' onclick='return confirmar()' >ELIMINAR</a>"; ?>
                </th>
            </tr>
            <?php
            }
           ?>
        </tbody>
		</div>
			</table>
			<br><br>
			// TABLA PSICOLOGICO
			 <?php 
			include ("conexion.php");
			$sql="SELECT * FROM  psicologico";
			$resultado=mysqli_query($conexion,$sql);
			?>
			<h1>Tabla Test Psicologico</h1>
			<a href="frm_psicologico.php">Nuevo test</a>

			<div class="tabla">
			<table>
			 	<thead>
					<tr>
						<th>ID</th>
						<th>Eleccion</th>
						<th>Rapidez</th>
						<th>E. Tactica Mental</th>
						<th>Observaciones</th>
						<th>Especialista</th>
						<th>Aciones</th>
						
					</tr>
				 </thead>

				 <?php 
            while ($filas=mysqli_fetch_assoc($resultado)) {
                ?>
            <tr>
				<th><?php echo $filas['id_psicologico'] ?></th>
                <th><?php echo $filas['eleccion'] ?></th>
                <th><?php echo $filas['rapidez'] ?></th>
                <th><?php echo $filas['efect_tactica_mental'] ?></th>
				<th><?php echo $filas['observaciones'] ?></th>
				<th><?php echo $filas['id_especialista02'] ?></th>
				
                <th>
                
                <?php echo "<a href='frm_medico_e.php?id_psicologico=".$filas['id_psicologico']."'>EDITAR</a>"; ?>
                -
               <?php echo "<a href='frm_psicologico_d.php?id_psicologico=".$filas['id_psicologico']."' onclick='return confirmar()' >ELIMINAR</a>"; ?>
                </th>
            </tr>
            <?php
            }
           ?>
        </tbody>
		</div>
		</table>

		// TABLA ANTECEDENTE MEDICO
			 <?php 
			include ("conexion.php");
			$sql="SELECT * FROM  antecedente_medico";
			$resultado=mysqli_query($conexion,$sql);
			?>
			<h1>Tabla Antecedente Medico</h1>
			<a href="frm_medico.php">Nuevo test</a>

			<div class="tabla">
			<table>
			 	<thead>
					<tr>
						<th>ID</th>
						<th>Enfermdedades de Familia</th>
						<th>Enfermedades</th>
						<th>Cirugias</th>
						<th>Alergias</th>
						<th>Lesiones</th>
						<th>Medicamentos</th>
						<th>Preparador Fisico</th>
						<th>Aciones</th>
						
					</tr>
				 </thead>

				 <?php 
            while ($filas=mysqli_fetch_assoc($resultado)) {
                ?>
            <tr>
				<th><?php echo $filas['id_antecedente'] ?></th>
                <th><?php echo $filas['enfermedades_flia'] ?></th>			
				<th><?php echo $filas['enfermedades'] ?></th>
                <th><?php echo $filas['cirugias'] ?></th>
                <th><?php echo $filas['alergias'] ?></th>
				<th><?php echo $filas['lesiones'] ?></th>
				<th><?php echo $filas['medicamentos'] ?></th>
				<th><?php echo $filas['id_preparador_fisico03'] ?></th>
				
                <th>
                  <?php echo "<a href='frm_medico_e.php?id_antecedente=".$filas['id_antecedente']."'>EDITAR</a>"; ?>
                -
				  <?php echo "<a href='frm_medico_d.php?id_antecedente=".$filas['id_antecedente']."' onclick='return confirmar()' >ELIMINAR</a>"; ?>

                </th>
            </tr>
            <?php
            }
           ?>
        </tbody>
		</div>
		</table>
		
		<script src="formulario.js"></script>
	</body>
</html>
