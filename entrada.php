<!-- CONEXION y Configuraciones-->
<?php require_once __DIR__."\includes\config.php" ?>
<?php require_once "./files/register.php" ?>
<?php require_once "./includes/functions.php" ?>


    <!-- HEADER -->
<?php require_once "./includes/header.php"?>

        <!-- SIDE BAR -->
        <?php require_once "./includes/sidebar.php"?>

        <!-- PRINCIPAL -->
        <div id="principal">
            <?php $entradas = conseguirEntrada($conexion,$_GET["id"]);?>
            <h1><?=$entradas["titulo"] ?></h1>
            <a href="categoria.php?id=<?=$entradas["categoria_id"]?>">
                <h2><?=$entradas["categoria"] ?></h2>
            </a>
            <h4><?=$entradas["fecha"]?> | <?=ucwords($entradas["usuario"])?> </h4>
            <br>
            <p>
                <?=$entradas["descripcion"] ?>
            </p>
            
            <?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["id"] == $entradas["usuario_id"]) :?>
                <a href="<?= PATH?>files/editar-entrada.php?id=<?= $entradas["id"]?>" class="boton-session boton-verde-editar">Editar Entrada</a>
                <a href="<?= PATH?>files/borrar-entrada.php?id=<?= $entradas["id"]?>" class="boton-session boton-rojo-editar">Borrar Entrada</a>
            <?php endif ;?>
                
            
        
        </div>    
        <div class="clearfix"></div>
  
    
    <!-- FOOTER -->
    <?php require_once "./includes/footer.php"?>