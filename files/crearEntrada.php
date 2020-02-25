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
    <h1>Crear Entrada</h1>
    <p>
        Aqui puedes crear tu propia entrada !!
    </p>
    <br>
    <form action="guardarEntrada.php" method="post" >
        <label for="entrytitle">Titulo de la Entrada:</label>
        <input type="text" name="entrytitle" placeholder="Ingrese el titulo de la nueva entrada a crear" id="" />
        <?php if (isset($_SESSION["errorcarga"])) :?>
            <div class="error">
                <?= $_SESSION["errorcarga"]?>
            </div>
        <?php endif ;?>
        <br>
        <label for="entrydescrip">Descripcion de la Entrada:</label>
        <textarea name="entrydescrip" cols="30" rows="10" placeholder="Ingrese la descripcion de la entrada"></textarea>
        <?php if (isset($_SESSION["error-loging"])) :?>
            <div class="error">
                <?= $_SESSION["error-loging"]?>
            </div>
        <?php endif ;?>
        <?php if (isset($_SESSION["completo"])) :?>
            <div class="errorlogin ok">
                <?= $_SESSION["completo"]?>
            </div>
        <?php endif ;?>
        <?php borrarErrores();?>
        <br>
        <select name="entry_categoria-id">
            <?php  $categorias = conseguirCategorias($conexion);
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                    <option value="<?= $categoria["id"]?>">
                        <?= $categoria["nombre"]?>
                    </option>
            <?php endwhile ; ?>
        </select>
        </br>
        </br>                
        <input type="submit" value="Crear Entrada"/>
    </form>
    
</div>
        
<div class="clearfix"></div>

    <!-- FOOTER -->
<?php require_once "../includes/footer.php"?>