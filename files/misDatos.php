<?php
require_once "redireccion.php";
require_once "../includes/config.php";
//HEADER
require_once "../includes/header.php";
// SIDE BAR
require_once "../includes/sidebar.php"?>

    <!-- PRINCIPAL -->
    <div id="principal">
        <h1>MIS DATOS</h1>
        <form class="formUserUpdate" action="updateDataUser.php" method="post">
            <label for="name">Nombre: </label>
            <input type="text" name="name"  placeholder=<?= ucwords($_SESSION["usuario"]["nombre"])?>>
            <?php if(isset($_SESSION["errores"])): ?>
                <div class="errorform">
                    <font size="2"><?= $_SESSION["errores"] ?></font>
                </div>
            <?php endif; ?>
            <label for="lastname">Apellido: </label>
            <input type="text" name="lastname"  placeholder=<?= ucwords($_SESSION["usuario"]["apellido"])?>>
            <?php if(isset($_SESSION["errorcarga"])): ?>
                <div class="errorform">
                    <font size="2"><?= $_SESSION["errorcarga"] ?></font>
                </div>
            <?php endif; ?>
            <label for="email">Email: </label>
            <input type="email" name="email"  placeholder=<?= $_SESSION["usuario"]["email"]?>>
            <?php if(isset($_SESSION["error-loging"])): ?>
                <div class="errorform">
                    <font size="2"><?= $_SESSION["error-loging"] ?></font>
                </div>
            <?php endif; ?>
            <label for="password">Cambiar Contraseña: </label>
            <input type="password" name="password"  placeholder="Ingrese nueva contraseña">
            <input type="password" name="password2"  placeholder="Repita nueva contraseña">
            <?php if(isset($_SESSION["completo"])): ?>
                <div class="errorform">
                    <font size="2"><?= $_SESSION["completo"] ?></font>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION["cargaOk"])): ?>
                <div class="ok">
                    <font size="3"><?= $_SESSION["cargaOk"] ?></font>
                </div>
            <?php endif; ?>
            <?php borrarErrores(); ?>
            <br>
            <label for="date">Usuario desde: </label>
            <p name="date"><?= $_SESSION["usuario"]["fecha"]?></p>
            <br>
            <input type="submit" value="Actualizar datos" />

        </form>


        
    
    </div>    
    <div class="clearfix"></div>
  
    
<!-- FOOTER -->
<?php require_once "../includes/footer.php"?>
