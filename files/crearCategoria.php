<?php
require_once "redireccion.php";
require_once "../includes/functions.php";
?>

    <!-- HEADER -->
<?php require_once "../includes/header.php"?>
    <!-- SIDE BAR -->
<?php require_once "../includes/sidebar.php"?>

<!-- PRINCIPAL -->
<div id="principal">
    <h1>Crear Categoria</h1>
    <p>
        Crea una categoria para que el usuario la pueda usar cuando añada un
        post.
    </p>
    <br>
    <form action="guardarCategoria.php" method="post">
        <label for="categoryname">Nombre de la Categoria:</label>
        <input type="text" name="categoryname" placeholder="Ingrese el nombre de la nueva categoria a crear" id="" />
        <input type="submit" value="Crear Categoria">
    </form>
    <?php if(isset($_SESSION['errorcarga'])):?>
        <div class="errorlogin">
            <?=$_SESSION['errorcarga'] ?>
        </div>
        <?php borrarErrores() ?>
    <?php endif;?>
    <?php if(isset($_SESSION['completo'])):?>
        <div class="errorlogin ok">
            <?=$_SESSION['completo'] ?>
        </div>
        <?php borrarErrores() ?>
    <?php endif;?>
</div>
        
<div class="clearfix"></div>

    <!-- FOOTER -->
<?php require_once "../includes/footer.php"?>