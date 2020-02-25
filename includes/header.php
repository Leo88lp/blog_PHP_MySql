<?php
//session_start();
require_once "functions.php";
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATH?>assets/css/style.css">

    <title>Blog de Videojuegos</title>
</head>
<body>

    <header id="cabecera">
        <!-- CABECERA -->
        <div id="logo">
            <a href="<?= PATH ?> ">
                Blog Videojuegos
            </a>
        </div>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="<?= PATH ?>">Inicio</a></li>
        
                <?php  $categorias = conseguirCategorias($conexion);
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                    <li><a href="<?=PATH?>categoria.php?id=<?=$categoria["id"]?>"><?= $categoria["nombre"] ?></a></li>
                <?php endwhile ; ?>
            
                <li><a href="index.php">Sobre Nosotros</a></li>
            
            
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>

        <div class="clearfix"></div>
    </header>
    <div id ="container">