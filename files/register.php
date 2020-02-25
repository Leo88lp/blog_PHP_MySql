<?php
//Inicio sesion
session_start();
//Validamos si se envio el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "../includes/config.php";
    // Variable donde guardamos el error
    $errores = array();
    //variables donde se guardaran los datos del usuario que llegan por POST
    $name = strtolower($_POST["name"]);
    $lastname = strtolower($_POST["lastname"]);
    $email = $_POST["email"];
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];

    //Validar nombre 
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9\W]/",$name) ){
       // echo "el nombre es valido <br>";
    } else {
        $errores["name"] = "El Nombre no es valido";
       // echo $errores["name"];
    }

    //Validar Apellido
     if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9\W]/",$lastname) ){
        //echo "el apellido es valido $lastname <br>";
    } else {
        $errores["lastname"] = "El Apellido no es valido";
       // echo $errores["lastname"];
    }


    //Validar email
    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
       //echo "el mail es valido <br>";
    } else {
        $errores["email"] = "El email no es valido";
        //echo $errores["email"];
    }

    //Validar password
    if(empty($pass1) or empty($pass2)){
    //Si alguna de las 2 contraseñas esta vacia pedimos que la ingresen
        if(empty($pass1)){
            //echo "Ingrese contraseña";
            $errores["password"] = "Ingrese contraseña";
        } else {
            //echo "Ingrese contraseña nuevamente";
            $errores["password"] = "Ingrese contraseña nuevamente";
        }
    // Si las contraseñas no estan vacias se comparan
    } else {
        if ($pass1 == $pass2){
           $password_cifrada = password_hash($pass1, PASSWORD_BCRYPT, ['cost' => 4]);
        } else {
            //echo "contraseña no coincide";
            $errores["password"] = "contraseña no coincide";
        }
        
    }
    //Verifica si no hay error
    if (!empty($errores)){
        $_SESSION["errores"] = $errores;
        header('Location: ../index.php');
    } else {
        $query = "INSERT INTO usuarios VALUES (null,'$name','$lastname','$email','$password_cifrada',CURDATE());";
        $consulta = mysqli_query($conexion,$query);

        if ($consulta) {
            $_SESSION["completo"] = "Se enviaron los datos con exito";
        } else {
            $_SESSION["errorcarga"] = "NO SE PUDO CARGAR EL USUARIO";
        }
        header('Location: ../index.php');
    }
} 

?>
