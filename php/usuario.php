<?php
class usuario {
    /*Funcion devolver datos del usuario*/
    public static function get($id){
        require 'php/conexion.php';
        $records = $conn->prepare("SELECT * FROM usuario WHERE  id_usuario = '$id'");
        $records->execute();
        $results = $records->get_result()->fetch_assoc();
        return $results;
    }
    /*Funcion para actualizar los datos de usuario*/
    public static function update($nombre, $usuario, $email, $id) {
        require 'php/conexion.php';
        $mensaje_verificacion = "";
        $records = $conn->prepare("UPDATE usuario SET nombre = '$nombre', email = '$email', usuario = '$usuario' WHERE id_usuario = '$id'");
        if($records-> execute()){
            $mensaje_verificacion = "Datos guardados exitosamente";
        }
        else{
            $mensaje_verificacion = 'Datos no actualizados';
        }
        return $mensaje_verificacion;
    }
    /*Cambiar contraseña*/
    public static function cambiar_password($password, $id) {
        require 'php/conexion.php';
        $verificacion = false ;
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $records = $conn->prepare("UPDATE usuario SET contrasenia = '$hash' WHERE id_usuario = '$id'");
        if($records-> execute()){
            $verificacion = true;
        }
        return $verificacion;
    }
    /*Iniciar sesion: Verificar contraseña*/
    public static function verificar_contraseña($contraseña, $hash){
        return password_verify($contraseña, $hash);
    }
    /*Eliminar registros cuerpo tecnico*/
    public static function eliminar_registro($id){
        require 'php/conexion.php';
        $records = $conn->prepare("DELETE FROM cuerpo_tecnico WHERE id_cuerpo_tecnico = '$id'");
        if($records-> execute()){
            return "Datos eliminados exitosamente";
        }
        else{
            return "Datos no eliminados";
        }
    }
    /*Eliminar registros usuario */
    public static function eliminar_registro_usuario($id){
        require 'php/conexion.php';
        $records = $conn->prepare("DELETE FROM usuario WHERE id_usuario = '$id'");
        if($records-> execute()){
            return "Datos eliminados exitosamente";
        }
        else{
            return "Datos no eliminados";
        }
    }
    /*agregar usuarios*/
    public static function agregar_usuarios($nombre, $email, $usuario, $password, $cargo){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO usuario(nombre, email, usuario, contrasenia, id_rol01) VALUES ('$nombre', '$email', '$usuario','$hash', '$cargo')");
        if($records-> execute()){
            return "Datos ingresados exitosamente";
        }
        else{
            return "Ocurrio un error. Datos no registrados";
        }
    }
    /*agregar personal*/
    public static function agregar_personal($nombre, $fech_nac, $ci, $tel, $fech_con, $cargo){
        require 'php/conexion.php';
        $records = $conn->prepare("INSERT INTO cuerpo_tecnico(nombre, fecha_nac, num_documento, fecha_contratacion, telefono, id_cargo01) VALUES ('$nombre', '$fech_nac', '$ci', '$fech_con','$tel','$cargo')");
        if($records-> execute()){
            return "Datos ingresados exitosamente";
        }
        else{
            return "Ocurrio un error. Datos no registrados";
        }
    }
    /*Actualizar registros del jugador*/
    public static function update_player($id, $nombre, $apellido_p, $apellido_m,$lugar_nacimiento, $fecha_nacimiento, $id_categoria, $id_posicion, $id_cuerpo_tecnico) {
        require 'php/conexion.php';
        $mensaje_verificacion = "";

        $sql= "UPDATE jugador SET  nombre='".$nombre."',ap_paterno='".$apellido_p."', ap_materno='".$apellido_m."' ,
            lugar_nac='".$lugar_nacimiento."' , fecha_nac='".$fecha_nacimiento."' , id_categoria01='".$id_categoria."' 
            , id_posicion01='".$id_posicion."', id_director_tecnico01='".$id_cuerpo_tecnico."'
            WHERE id_jugador='".$id."' ";
        $resultado=mysqli_query($conn,$sql);

        if($resultado){
            $mensaje_verificacion = "Datos guardados exitosamente";
        }
        else{
            $mensaje_verificacion = 'Datos no actualizados';
        }
        return $mensaje_verificacion;
    }
}