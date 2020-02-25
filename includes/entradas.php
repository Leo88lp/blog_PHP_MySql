<!-- CONEXION y Configuraciones-->
<?php require_once "config.php" ?>
<?php require_once "../files/register.php" ?>
<?php require_once "functions.php" ?>


    <!-- HEADER -->
<?php require_once "header.php"?>

        <!-- SIDE BAR -->
        <?php require_once "sidebar.php"?>

        <!-- PRINCIPAL -->
        <div id="principal">
            <h1>Todas las Entradas</h1>
            <?php $entradas = conseguirEntradas($conexion)?>
            <?php if (!empty($entradas)):?>
                <?php while ($entrada = mysqli_fetch_assoc($entradas)):?>
                    <article class="post">
                        <a href="../entrada.php?id=<?=$entrada["id"]?>">
                            <h2><?= $entrada["titulo"];?></h2>
                            <span class="fecha"><?= $entrada["categoria"]. " | " . $entrada["fecha"];?></span><br>
                            <p><?=substr($entrada["descripcion"], 0,180)."..." ?></p>
                        </a>
                    </article>
                <?php   endwhile;
                endif;
            ?>

                
        
        </div>    
        <div class="clearfix"></div>
  
    
    <!-- FOOTER -->
    <?php require_once "footer.php"?>
