<?php  
require_once "redireccion.php";

if (isset($_GET["id"])){
    require_once "../includes/config.php";

    $usuario_id = $_SESSION["usuario"]["id"];
    $entrada_id = $_GET["id"];
    $query = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $entrada_id ;";
    mysqli_query($conexion, $query);
}

header('Location: '. PATH . 'index.php');
?>