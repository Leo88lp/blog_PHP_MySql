<!-- CONEXION y Configuraciones-->
<?php require_once "..\includes\config.php" ?>
<?php require_once "register.php" ?>
<?php require_once "../includes/functions.php" ?>

<?php $entradas = conseguirEntrada($conexion,$_GET["id"]);
if(!isset($entradas["id"])){header('Location:'.PATH. 'index.php');}?>

    <!-- HEADER -->
<?php require_once "../includes/header.php"?>

    <!-- SIDE BAR -->
<?php require_once "../includes/sidebar.php"?>

<!-- PRINCIPAL -->
<div id="principal">
    
<h1>Editar Entrada</h1>
    <br>
    <p>
        Editar: <?= $entradas["titulo"] ?>
    </p>
    <br>
    <br>
    <form action="<?=PATH?>/files/actualizarEntrada.php?id=<?=$entradas["id"]?>" method="post" >
        <label for="entrytitle">Titulo de la Entrada:</label>
        <input type="text" name="entrytitle" placeholder= "<?= $entradas["titulo"] ?>" id="" />
        <?php if (isset($_SESSION["errores"]["errortitulo"])) :?>
            <div class="error">
                <?= $_SESSION["errores"]["errortitulo"]?>
            </div>
        <?php endif ;?>
        <br>
        <label for="entrydescrip">Descripcion de la Entrada:</label>
        <textarea name="entrydescrip" cols="30" rows="10" placeholder="<?= $entradas["descripcion"] ?>"></textarea>
        <?php if (isset($_SESSION["errores"]["errordescrip"])) :?>
            <div class="error">
                <?= $_SESSION["errores"]["errordescrip"]?>
            </div>
        <?php endif ;?>
        <br>
        <select name="entry_categoria-id">
            <?php  $categorias = conseguirCategorias($conexion);
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                    <option value="<?= $categoria["id"]?>"
                    <?=($categoria["id"] == $entradas["categoria_id"]) ? 'selected="selected"' : "" ?>
                    >
                        <?= $categoria["nombre"]?>
                    </option>
            <?php endwhile ; ?>
        </select>
        <?php if (isset($_SESSION["errores"]["errorselect"])) :?>
            <div class="error">
                <?= $_SESSION["errores"]["errorselect"]?>
            </div>
        <?php endif ;?>
        <?php if (isset($_SESSION["completo"])) :?>
            <div class="errorlogin ok">
                <?= $_SESSION["completo"]?>
            </div>
        <?php endif ;?>
        <?php borrarErrores();?>
        <br>
        </br>                
        <input type="submit" value="Actualizar Entrada"/>
    </form>
        
    

</div>    
<div class="clearfix"></div>
  
<!-- FOOTER -->
<?php require_once "../includes/footer.php"?>