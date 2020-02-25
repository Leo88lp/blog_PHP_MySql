<?php 
// Establecer la session y conexion
session_start();
require_once "../includes/config.php";

// Recuperar datos del formulario
if ($_POST){
    // si la contraseña esta vacia, creamos un error
    if (empty($_POST["contraseña"])){
        $_SESSION["error-loging"] = "Ingrese contraseña";
        header('Location: ../index.php');
    // si contiene algo, le sacamos los espacios y la guardamos
    } else {
        $user_pass = $_POST["contraseña"];
        $user_pass = trim($user_pass);
    }

    // si el usuario esta vacio, creamos un error
    if (empty ($_POST["user"])){
        $_SESSION["error-loging"] = "Ingrese usuario";
        header('Location: ../index.php');
    // si contiene algo, le sacamos los espacios y la guardamos
    } else {
        $user_user = $_POST["user"];
        $user_user = trim($user_user);
    }
 // Verificarlos con los usuarios de la DB

    $query = "SELECT * FROM usuarios WHERE email = '$user_user'";
    $login = mysqli_query($conexion,$query);

    if ($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);

     // Verificar la contraseña que llega de la DB con la del formulario

        $password_verify = password_verify($user_pass, $usuario["password"]);
        
        if ($password_verify){
            $_SESSION["usuario"] = $usuario ;
            header('Location: '. PATH . 'index.php'); 
        } else {
            $_SESSION["error-loging"] = "Usuario o Contraseña no validos";
            header('Location: ../index.php');
        }
    }else {
        $_SESSION["error-loging"] = "Usuario o Contraseña no validos";
        header('Location: ../index.php');
    }
    



} else {
    header('Location: ../index.php');
}



?>