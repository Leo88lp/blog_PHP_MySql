<?php
require_once "redireccion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Si se envio el formulario, se cargan las funciones y conexion.
    require_once "../includes/config.php";
    require_once "../includes/functions.php";
    // Si el name esta vacio, quiere decir que no lo cambio, redirigimos.
    // Si contiene algo, hacemos la verificacion para subirlo a la DB
    echo "<br>";
    $is_email = true ;
    $cargaOK = false;
    if (!empty($_POST["name"])){
        // Comprobamos que no sean solo espacios, que no sea igual o contenga caracteres
        // no permitidos. Tambien escapamos los datos para subirlo a la DB.
        $verifyName = comprobarUpdateForm($conexion, $_POST["name"],false);
        // Si la verificacion da falso, es que son iguales o contiene caracteres no permitidos.
        if ($verifyName == false){
            $_SESSION["errores"] = "Nombre Invalido: Contiene caracteres no permitidos o es Igual". "<br>";
        // Si pasa la verificacion, se sube al servidor el nuevo dato.
        } else {
            $upload = updateDataUser($conexion,"nombre",$verifyName,$_SESSION["usuario"]["id"]);
            if ($upload){
                $_SESSION["usuario"] = $upload ;
                $cargaOK = true;
            }
        }
    }

    if (!empty($_POST["lastname"])){
        // Comprobamos que no sean solo espacios, que no sea igual o contenga caracteres
        // no permitidos. Tambien escapamos los datos para subirlo a la DB.
        $verifyLastname = comprobarUpdateForm($conexion, $_POST["lastname"],false);
        // Si la verificacion da falso, es que son iguales o contiene caracteres no permitidos.
        if ($verifyLastname == false){
            $_SESSION["errorcarga"] = "Apellido Invalido: Contiene caracteres no permitidos o es Igual". "<br>";
        // Si pasa la verificacion, se sube al servidor el nuevo dato.
        } else {
            $upload = updateDataUser($conexion,"apellido",$verifyLastname,$_SESSION["usuario"]["id"]);
            if ($upload){
                $_SESSION["usuario"] = $upload ;
                $cargaOK = true;
            }
        }

    }

    if (!empty($_POST["email"])){
        // Comprobamos que no sean solo espacios, que no sea igual o contenga caracteres
        // no permitidos. Tambien escapamos los datos para subirlo a la DB.
        $verifyEmail = comprobarUpdateForm($conexion, $_POST["email"],$is_email);
        // Si la verificacion da falso, es que son iguales o contiene caracteres no permitidos.
        if ($verifyEmail == false){
            $_SESSION["error-loging"] = "Email Invalido: Contiene caracteres no permitidos o es Igual". "<br>";
        // Si pasa la verificacion, se sube al servidor el nuevo dato.
        } else {
            $upload = updateDataUser($conexion,"email",$verifyEmail,$_SESSION["usuario"]["id"]);
            if ($upload){
                $_SESSION["usuario"] = $upload ;
                $cargaOK = true;
            } else {
                $_SESSION["error-loging"] = "El email ya existe!";
            }
        }

    }
   
    //Validar password
    if(empty($_POST["password"]) && empty($_POST["password2"])){
        // Si ambas estan vacias, el usuario no las cambio.
        // Si las contraseñas no estan vacias se comparan y se cifran
    } else {
        $pass = cifrarPassword($conexion,$_POST["password"],$_POST["password2"]);

        if (!$pass){
            $_SESSION["completo"] =  "Contraseñas no coinciden o Invalida";
        } else {
            $verifyPass = $pass;
            $upload = updateDataUser($conexion,"password",$verifyPass,$_SESSION["usuario"]["id"]);
            if ($upload){
                $_SESSION["usuario"] = $upload ;
                $cargaOK = true;
            }
        }
        
    }

    if ($cargaOK){
        $_SESSION["cargaOk"] = "Se actualizaron los datos";
    }    
header('Location: '. PATH . 'files/misDatos.php'); 
} 
?>