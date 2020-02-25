<?php
    require_once "redireccion.php";
    // Comprobamos que se haya enviado el formulario (seguridad)
    if (isset($_POST)) {
        //Conectamos a la base de datos.
        require_once "../includes/config.php";
        require_once "../includes/functions.php";
        
        // Comprobamos que el categoryname no este vacio ni contenga solamente espacios en blanco
        if(!empty($_POST["entrytitle"]) && strlen(trim($_POST["entrytitle"]))>0 ){
            //escapamos los datos para que no se tome com html (seguridad)
            $entrytitle = trim($_POST["entrytitle"]);
            $entrytitle = escaparDatos($conexion,$entrytitle);
            
            // Buscamos entradas en la DB con el mismo nombre de la entrada a crear.
            $query = "SELECT titulo FROM entradas WHERE titulo = '$entrytitle';";
            $resultado = mysqli_query($conexion,$query);
            // Si se pudo conectar a la DB y devuelve un valor (el titulo existe)
            if ($resultado && mysqli_num_rows($resultado)>0){
                $_SESSION["errorcarga"] = "El titulo de la entrada YA EXISTE, por favor, INGRESE UNO DIFERENTE";
            } 
        } else {
            $_SESSION["errorcarga"] = "Por Favor. Ingrese un titulo";
        }
        
        // Comprobamos que el entrydescrip no este vacio ni contenga solamente espacios en blanco
        if(!empty($_POST["entrydescrip"]) && strlen(trim($_POST["entrydescrip"]))>0 ){
            //escapamos los datos para que no se tome com html (seguridad)
            $entrydescrip = trim($_POST["entrydescrip"]);
            $entrydescrip = escaparDatos($conexion,$entrydescrip);
        } else {
            $_SESSION["error-loging"] = "Por Favor. Ingrese una descripcion";
        }
        
        // Guardamos el id de la categoria del select si existe categoria para seleccionar.
        if(!empty($_POST["entry_categoria-id"]) && strlen(trim($_POST["entry_categoria-id"]))>0 ){
            $categoria_id_entry = $_POST["entry_categoria-id"];
        }
        
        // Guardamos el ID del usuario que creo la entrada
        $id_usuario = $_SESSION["usuario"]["id"];

        // Subimos los datos a la DB siempre y cuando no existan errores.
        if (!isset($_SESSION["errorcarga"]) && !isset($_SESSION["error-loging"]) ){
            $query = "INSERT INTO entradas VALUES (NULL, '$id_usuario' , '$categoria_id_entry', '$entrytitle' , '$entrydescrip' , CURDATE());";
            $upload = mysqli_query($conexion,$query);

            if ($upload){
                $_SESSION["completo"] = "Etrada creada con exito";
            } else {
                $_SESSION["error-loging"] = "Error en la peticion a la DB";
            }
        }
    }
    header('Location:' . PATH . "files/crearEntrada.php");
?>
