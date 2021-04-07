<?php
class consultas {
    /*1. Ver los nombres de posicion, categoria, director tecnico de cada jugador */
    public static function ver_datos($id){
        require 'php/conexion.php';
        /*1. Ver los nombres de posicion, categoria, director tecnico de cada jugador */
        $consulta_1 = "SELECT c.nombre categoria, p.nombre posicion, CONCAT(j.nombre,' ',j.ap_paterno,' ', j.ap_materno) jugador, 
        j.fotografia fotografia, j.lugar_nac lugar_nac, j.fecha_nac fecha_nac, j.id_jugador id_jugador
        FROM categoria c INNER JOIN jugador j ON c.id_categoria = j.id_categoria01 
        INNER JOIN posicion p ON p.id_pocision = j.id_posicion01
        WHERE j.id_jugador = '$id'";
        $records = $conn->prepare("$consulta_1");
        $records->execute();
        $results = $records->get_result()->fetch_assoc();
        return $results;
    }
}
?>