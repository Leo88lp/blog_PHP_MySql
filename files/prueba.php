<?php
require_once "/xampp/htdocs/proyecto-php-mysql/includes/config.php";

echo "hola"; 

$query = "UPDATE usuarios SET email = 'pepito@gmail.com' WHERE id = 2;";
$resultado = mysqli_query($conexion,$query);

if (!$resultado){
    echo "fallo en el cambio";
    var_dump($resultado);
} else {
    echo "Se cambio correctamente";
    var_dump($resultado);
}

?>