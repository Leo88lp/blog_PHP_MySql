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
            <?php $categoria_actual = conseguirCategoria($conexion,$_GET["id"]);
            if(!isset($categoria_actual["id"])){header('Location: index.php');}
            ?>
            <h1>Entradas de <?= $categoria_actual["nombre"] ?></h1>
            
            <?php $entradas = conseguirEntradas($conexion,null,$_GET["id"]);?>
            <?php if (!empty($entradas)):?>
                <?php while ($entrada = mysqli_fetch_assoc($entradas)):?>
                    <article class="post">
                        <a href="entrada.php?id=<?=$entrada["id"]?>">
                            <h2><?= $entrada["titulo"];?></h2>
                            <span class="fecha"><?= $entrada["categoria"]. " | " . $entrada["fecha"];?></span><br>
                            <p><?=substr($entrada["descripcion"], 0,180)."..." ?></p>
                        </a>
                    </article>
                <?php   endwhile;
                else:
            ?>
                <div class="error">No hay entradas en esta categoria</div>
            <?php endif ;?>
                
            <div id="vertodas">
                <a href="<?=PATH?>includes/entradas.php">Ver todas las entradas</a>
            </div>
        
        </div>    
        <div class="clearfix"></div>
  
    
    <!-- FOOTER -->
    <?php require_once "./includes/footer.php"?>