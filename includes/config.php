<?php
    define('PATH',"/proyecto-php-mysql/");

    $hostname = "localhost";
    $user = "admin";
    $password = "admin";
    $basedatos = "blog_test";

    $conexion = mysqli_connect($hostname,$user,$password,$basedatos);

    if (!$conexion){
        header('Location: ' . PATH . "error404.php");
    }

    mysqli_query($conexion, "SET NAMES 'utf8'");
    
    
?>