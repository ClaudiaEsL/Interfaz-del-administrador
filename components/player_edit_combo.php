<?php
/*Cargar los datos al formulario */
/*Categoria */
$consulta1 =  mysqli_query($conn,"SELECT id_categoria, nombre FROM categoria");
$combo1 = '<select class="form-select form-select-sm selector" name="id_categoria"  >\n';
while ($categoria = mysqli_fetch_array($consulta1)){
    $selected = '';
    if ($categoria['id_categoria'] == $personas['id_categoria01']){
        $selected = 'selected';
    }
    $combo1 .= '<option value="'.$categoria['id_categoria'].'"" '.$selected.'>'.$categoria['nombre'].'</option>\n';
}
$combo1 .= "</select>";
/*Posicion */
$consulta2 =  mysqli_query($conn,"SELECT id_pocision, nombre FROM posicion");
$combo2 = '<select class="form-select form-select-sm selector" name="id_posicion" >\n';
while ($posicion = mysqli_fetch_array($consulta2)){
    $selected = '';
    if ($posicion['id_pocision'] == $personas['id_posicion01']){
        $selected = 'selected';
    }
    $combo2 .= '<option value="'.$posicion['id_pocision'].'"" '.$selected.'>'.$posicion['nombre'].'</option>\n';
}
$combo2 .= "</select>";
/*Director tecnico */
$consulta3 =  mysqli_query($conn,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico");
$combo3 = '<select class="form-select form-select-sm selector" name="id_cuerpo_tecnico" >\n';
while ($director_tecnico = mysqli_fetch_array($consulta3)){
    $selected = '';
    if ($director_tecnico['id_cuerpo_tecnico'] == $personas['id_director_tecnico01']){
        $selected = 'selected';
    }
    $combo3 .= '<option value="'.$director_tecnico['id_cuerpo_tecnico'].'"" '.$selected.'>'.$director_tecnico['nombre'].'</option>\n';
}
$combo3 .= "</select>";
?>