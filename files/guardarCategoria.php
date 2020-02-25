<?php
require_once "redireccion.php";
// Si la variable existe y no esta vacia, se carga a la DB
if( (!empty($_POST['categoryname']))  && strlen(trim($_POST['categoryname'])) >0 ){
    require_once "../includes/config.php";
    
    $categoryname = mysqli_real_escape_string($conexion,$_POST['categoryname']);
    
    //Verificar si ya no existe la categoria a crear
    $query = "SELECT * FROM categorias WHERE nombre = '$categoryname';";
    $download = mysqli_query($conexion,$query);
    //Si la consulta devuelve un resultado quiere decir que ya existe.
    if (mysqli_num_rows($download) == 1){
        $_SESSION["errorcarga"] = "La categoria ya existe";
    } else {
        // Subir nueva categoria a la DB
        $query = "INSERT INTO categorias VALUES (NULL,'$categoryname');";
        $upload = mysqli_query($conexion,$query);
        

        if($upload){
            $_SESSION["completo"] = "Categoria Creada";
        } else {
            $_SESSION["errorcarga"] = "Error de conexion con la DB, no se pudo crear la categoria";
        }
    }

//Si no existe o esta vacia, redirige y crea un error
} else {
    $_SESSION["errorcarga"] = "Por favor. Ingrese una categoria";
}

header('Location: '. PATH . 'files/crearCategoria.php');
    
?>