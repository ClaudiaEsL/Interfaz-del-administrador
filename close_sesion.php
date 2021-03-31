<?php
    session_start();
    require 'php/conexion.php';
    session_unset();

    session_destroy();
    header('Location: index.php');
?>