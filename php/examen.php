<?php
class examen {

    public static function agregar_examen_psicologico($eleccion, $rapidez,$efect_tactica_mental,$observaciones, $id_psicologo){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO `psicologico`(`id_psicologico`, `eleccion`, `rapidez`, `efect_tactica_mental`, `observaciones`, `id_especialista02`) VALUES (NULL,'$eleccion','$rapidez','$efect_tactica_mental','$observaciones','$id_psicologo')");
        if($records->execute()){
            $records = $conn->prepare("SELECT MAX(id_psicologico) id FROM psicologico");
            $records->execute();
            $results = $records->get_result()->fetch_assoc();
            return $results['id'];
        }
        else{
            return "Ocurrio un error. Datos no registrados";
        }
    }
    public static function agregar_examen_fisico($estatura, $peso, $pulso, $control_vista,$postura,$articulaciones, $resistencia, $flexibilidad, $tension_arterial, $id_preparador){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO fisico
        (estatura, peso, pulso, tension_arterial, control_vista, postura, articulaciones, resistencia, flexibilidad, id_preparador_fisico02)
        VALUES ('$estatura','$peso','$pulso','$tension_arterial','$control_vista','$postura','$articulaciones','$resistencia','$flexibilidad','$id_preparador')");
        if($records->execute()){
            $records = $conn->prepare("SELECT MAX(id_fisico) id FROM fisico");
            $records->execute();
            $results = $records->get_result()->fetch_assoc();
            return $results['id'];
        }
        else{
            return "Ocurrio un error. Datos no registrados: Examen fisico";
        }
    }
    public static function agregar_examen_antecedentes_medicos($enfermedades_f, $enfermedades, $cirugias, 
        $alergias, $lesiones,$medicamentos,$id_preparador){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO antecedente_medico(id_antecedente ,enfermedades_flia	,
         enfermedades, cirugias, alergias, lesiones, medicamentos, id_preparador_fisico03)
        VALUES(NULL,'$enfermedades_f','$enfermedades','$cirugias','$alergias','$lesiones',
         '$medicamentos','$id_preparador')");
        if($records->execute()){
            $records = $conn->prepare("SELECT MAX(id_antecedente) id FROM antecedente_medico");
            $records->execute();
            $results = $records->get_result()->fetch_assoc();
            return $results['id'];
        }
        else{
            return "Ocurrio un error. Datos no registrados: Examen antecedentes medicos";
        }
    }
    public static function agregar_examen_predeportivo($id_fisico_obtenido, $id_medico_obtenido){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO predeportivo (id_predeportivo ,id_fisico01, id_antecedente01)
        VALUES(NULL ,'$id_fisico_obtenido ','$id_medico_obtenido ')");
        if($records->execute()){
            $records = $conn->prepare("SELECT MAX(id_predeportivo) id FROM predeportivo");
            $records->execute();
            $results = $records->get_result()->fetch_assoc();
            return $results['id'];
        }
        else{
            return "Ocurrio un error. Datos no registrados: Examen predeportivo";
        }
    }
    /*Devolver id fisico-medico */
    public static function agregar_examen($id_jugador, $fecha_registro, $id_psicologico_obtenido, $id_predeportivo_obtenido ){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO examen (d_jugador04, fecha, id_predeportivo01, id_psicologico01)
        VALUES('$id_jugador', ' $fecha_registro', '$id_predeportivo_obtenido','$id_psicologico_obtenido')");
        if($records->execute()){
            return "Datos registrados exitosamente";
        }
        else{
            return "Ocurrio un error. Datos no registrados: Examen";
        }
    }
}
?>