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

            $id_fisico=$_POST['id_fisico'];
            $estatura=$_POST['estatura'];
            $peso=$_POST['peso'];
            $pulso=$_POST['pulso'];
            $tension_arterial =$_POST['tension_arterial'];
            $control_vista =$_POST['control_vista'];
            $postura =$_POST['postura'];
            $articulaciones =$_POST['articulaciones'];
            $resistencia =$_POST['resistencia'];
            $flexibilidad =$_POST['flexibilidad'];

            $sql= "update fisico set  estatura='".$estatura."',peso='".$peso."', pulso='".$pulso."' ,
                tension_arterial='".$tension_arterial."' , control_vista='".$control_vista."' , postura='".$postura."' ,
                articulaciones='".$articulaciones."', resistencia='".$resistencia."', flexibilidad='".$flexibilidad."'
                where id_fisico='".$id_fisico."' ";
               
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

        $id_fisico=$_GET['id_fisico'];
        $sql= "SELECT * FROM fisico WHERE id_fisico='".$id_fisico."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado);           
            $estatura=$fila["estatura"];
            $peso=$fila["peso"];
            $pulso=$fila["pulso"];
            $tension_arterial =$fila["tension_arterial"];
            $control_vista=$fila["control_vista"];
            $postura=$fila["postura"];
            $articulaciones =$fila["articulaciones"];
            $resistencia=$fila["resistencia"];
            $flexibilidad =$fila["flexibilidad"];

        mysqli_close($conexion);
    ?>
        <div class="contenedor">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="contenedor-inputs">

                    <input type="text" name="id_fisico" type="hidden" value="<?php echo $id_fisico; ?>">
				    <input type="text" name="estatura" value="<?php echo $estatura; ?>">
				    <input type="text" name="peso" value="<?php echo $peso; ?>">
				    <input type="text" name="pulso" value="<?php echo $pulso; ?>">
				    <input type="text" name="tension_arterial" value="<?php echo $tension_arterial; ?>">
				    <input type="text" name="control_vista" value="<?php echo $control_vista; ?>">
				    <input type="text" name="postura" value="<?php echo $postura; ?>">
				    <input type="text" name="articulaciones" value="<?php echo $articulaciones; ?>">
				    <input type="text" name="resistencia" value="<?php echo $resistencia; ?>">
				    <input type="text" name="flexibilidad" value="<?php echo $flexibilidad; ?>">

       

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