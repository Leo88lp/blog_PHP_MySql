<?php
    require_once "redireccion.php";
    // Comprobamos que se haya enviado el formulario (seguridad)
    if (isset($_POST)) {
        //Conectamos a la base de datos.
        require_once "../includes/config.php";
        require_once "../includes/functions.php";
        $entradas = conseguirEntrada($conexion,$_GET["id"]);
        $upload = false;
        $usuarioID = $_SESSION["usuario"]["id"];
        // Comprobamos que el categoryname no este vacio ni contenga solamente espacios en blanco
        if(!empty($_POST["entrytitle"]) && strlen(trim($_POST["entrytitle"]))>0 ){
            //escapamos los datos para que no se tome com html (seguridad)
            $entrytitle = trim($_POST["entrytitle"]);
            $entrytitle = escaparDatos($conexion,$entrytitle);
            $originaltitle = $entradas["titulo"];
            
            if ($entrytitle == $originaltitle){
                $_SESSION["errores"]["errortitulo"] = "El titulo es igual al original";
            } else {
                // UPDATE
                echo "hay que UPGRADEARLO";
                $query = "UPDATE entradas SET titulo = '$entrytitle' WHERE usuario_id = '$usuarioID';";
                $resultado = mysqli_query($conexion,$query);
                $upload = true;
            }
        }
        
        // Comprobamos que el entrydescrip no este vacio ni contenga solamente espacios en blanco
        if(!empty($_POST["entrydescrip"]) && strlen(trim($_POST["entrydescrip"]))>0 ){
            //escapamos los datos para que no se tome com html (seguridad)
            $entrydescrip = trim($_POST["entrydescrip"]);
            $entrydescrip = escaparDatos($conexion,$entrydescrip);
            $originaldesc = $entradas["descripcion"];
            
            if ($entrydescrip == $originaldesc){
                $_SESSION["errores"]["errordescrip"] = "La descripcion es igual al original";
                
            } else {
                // UPDATE
                echo "hay que UPGRADEARLO";
                $query = "UPDATE entradas SET descripcion = '$entrydescrip' WHERE usuario_id = '$usuarioID';";
                $resultado = mysqli_query($conexion,$query);
                $upload = true;
            }
        }
        
        // Guardamos el id de la categoria del select si existe categoria para seleccionar.
        if(!empty($_POST["entry_categoria-id"]) && strlen(trim($_POST["entry_categoria-id"]))>0 ){
            $categoria_id_entry = $_POST["entry_categoria-id"];
            $originalCategoryId = $entradas["categoria_id"];
            
            if ($categoria_id_entry != $originalCategoryId){
                
                $query = "UPDATE entradas SET categoria_id = '$categoria_id_entry' WHERE usuario_id = '$usuarioID';";
                $resultado = mysqli_query($conexion,$query);
                $upload = true;
            }

        }
        
        // Guardamos el ID del usuario que creo la entrada
        $id_usuario = $_SESSION["usuario"]["id"];
        
        if ($upload){
            $_SESSION["completo"] = "Datos actualizados con exito";
        }
    }

    header('Location:' . PATH . "files/editar-entrada.php?id=".$_GET["id"]);
?>