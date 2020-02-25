<!-- CONEXION y Configuraciones-->
<?php if(!isset($_SESSION)){
    session_start();
    }
    ?>

<?php require_once "..\includes\config.php" ?>
<?php require_once "../includes/functions.php" ?>
<?php 
if (empty($_POST["search"])){
    header("Location: ".PATH. "index.php");
}

$entradas = conseguirEntradas($conexion,null,null,$_POST["search"]);

?>

    <!-- HEADER -->
<?php require_once "../includes/header.php"?>

<!-- SIDE BAR -->
<?php require_once "../includes/sidebar.php"?>

<!-- PRINCIPAL -->
    <div id="principal">
            <h1>Busqueda: <?=strtoupper($_POST["search"])?></h1>
            <?php if (!empty($entradas)):?>
                <?php while ($entrada = mysqli_fetch_assoc($entradas)):?>
                    <article class="post">
                        <a href="<?=PATH?>entrada.php?id=<?=$entrada["id"]?>">
                            <h2><?= $entrada["titulo"];?></h2>
                            <span class="fecha"><?= $entrada["categoria"]. " | " . $entrada["fecha"];?></span><br>
                            <p><?=substr($entrada["descripcion"], 0,180)."..." ?></p>
                        </a>
                    </article>
                <?php   endwhile;
                endif;
            ?>

                
            <div id="vertodas">
                <a href="<?=PATH?>includes/entradas.php">Ver todas las entradas</a>
            </div>
        
    </div>    
<div class="clearfix"></div>
  
    
<!-- FOOTER -->
<?php require_once "../includes/footer.php"?>