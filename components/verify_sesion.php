<?php
session_start();
/*  Conexion a la base de datos*/
require 'php/conexion.php';

/*Clase para el usuario*/
include ("php/usuario.php");

/*Verificacion si tiene la sesion iniciada*/
if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    $results = usuario::get($id);

    /*Variable 'user'  donde guardaremos los datos del usuario*/
    $user = NULL;
    /*Verificar si el usuario esta registrado en la base de datos*/
    if(count($results)>0){
        $user = $results;
    }

}
else{
    header("Location: index.php");
}
?>