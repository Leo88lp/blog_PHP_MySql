        <aside id="sidebar">
            <div id="login" class="block-aside">
                <h3>Buscar</h3>
                    <form action="<?= PATH?>files/search.php" method="post">
                        <input type="text" name="search" placeholder="Ingrese busqueda">

                        <input type="submit" value="Buscar">
                    </form>
            </div>

            <?php if(isset($_SESSION["usuario"])) : // Muestra los botones si el usuario esta logueado?>
                <div id="login" class="block-aside">
                    <?= "<h3>"."Bienvenido ".ucwords($_SESSION["usuario"] ["nombre"])." ".ucwords($_SESSION["usuario"] ["apellido"])."</h3>" ;?>
                    <a href="<?= PATH?>files/crearEntrada.php" class="boton-session boton-verde">Crear Entrada</a>
                    <a href="<?= PATH?>files/crearCategoria.php" class="boton-session">Crear Categorias</a>
                    <a href="<?= PATH?>files/misDatos.php" class="boton-session boton-naranja">Mis Datos</a>
                    <a href="<?= PATH?>files/cerrarSession.php" class="boton-session boton-rojo">Cerrar Sesion</a>
                </div>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION["usuario"])) : //Oculta Registro y Login si ya esta logueado ?>    
            
            <div id="login" class="block-aside">
                <h3>Entra a la Web</h3>
                <form class="noesta" action="<?= PATH?>files/login.php" method="post">
                    <label for="user">Email / Usuario</label>
                    <input type="email" name="user">

                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña">

                    <input type="submit" value="Entrar">
                </form>
                <?php if(isset($_SESSION["error-loging"])){ // Muestra un mensaje si la veriable error existe
                    echo "<div class='errorlogin'>". $_SESSION["error-loging"] . "</div>";
                } ?>
            </div>

            <div id="register" class="block-aside">
                <h3>Registrate</h3>
                <form action="files/register.php" method="post">
                    <label for="name">Nombre</label>
                    <input type="text" name="name">

                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname">

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password1">Contraseña</label>
                    <input type="password" name="password1">

                    <label for="password2">Repita Contraseña</label>
                    <input type="password" name="password2">

                    <input type="submit" value="Registro">
                </form>
                <?php isset($_SESSION["errores"]) ? mostrarErrores($_SESSION["errores"]) : "" ;
                // Muestra el array de errores si la session trajo la variable errores con datos
                ?>
                <?php if(isset($_SESSION["errorcarga"])){
                    echo "<div class='error'>". $_SESSION["errorcarga"] . "</div>";
                } // Muestra error de conexion de base de datos?>
                <?php if(isset($_SESSION["completo"])){
                    echo "<div class='error'>". $_SESSION["completo"] . "</div>";
                } // Muestra mensaje que el formulario se envio?>
                <?php borrarErrores() ?>
              
            </div>
            <?php endif ;?>  
        </aside>