<?php
require_once "config.php";
    function mostrarErrores ($errores){
        
        echo "<div class='error'>";
                        foreach ($_SESSION["errores"] as $error) {
                            echo "<li>" . $error . "</li>";
                        }
        echo "</div>";
    }

    function borrarErrores(){
        if (isset($_SESSION["errores"])){
            $_SESSION["errores"] = null;
            unset($_SESSION["errores"]);
        }
        
        if (isset($_SESSION["errorcarga"])){
            $_SESSION["errorcarga"] = null;
            unset($_SESSION["errorcarga"]);
        }

        if (isset($_SESSION["completo"])){
            $_SESSION["completo"] = null;
            unset($_SESSION["completo"]);
        }

        if (isset($_SESSION["error-loging"])){
            $_SESSION["error-loging"] = null;
            unset($_SESSION["error-loging"]);
        }

        if (isset($_SESSION["cargaOk"])){
            $_SESSION["cargaOk"] = null;
            unset($_SESSION["cargaOk"]);
        }
        
    }

    function conseguirCategorias($conexion){
        $query = "SELECT * FROM categorias ORDER BY 'id' ASC;";
        $categorias = mysqli_query( $conexion,$query);
        $result = array();
        
        if ($categorias && mysqli_num_rows($categorias) >= 1){
            $result = $categorias;
        }
        return $result;
    }

    function conseguirCategoria($conexion,$id){
        $query = "SELECT * FROM categorias WHERE id = $id;";
        $categorias = mysqli_query( $conexion,$query);
        $result = array();
        
        if ($categorias && mysqli_num_rows($categorias) >= 1){
            $result = mysqli_fetch_assoc($categorias);
        }
        return $result;
    }


    function conseguirEntradas ($conexion, $limit = null , $categorias = null , $busqueda = null){
        $query = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id "
        ;

        if( !empty($categorias)) {
            $query .= "WHERE e.categoria_id = '$categorias' ";
        }

        if( !empty($busqueda)) {
            $query .= "WHERE e.titulo LIKE '%$busqueda%' ";
        }

        $query .= "ORDER BY e.id DESC ";

        if($limit != null){
            $query .= "LIMIT $limit;";
        }

        $entradas = mysqli_query($conexion,$query);
        
        $result = array();

        if ($entradas && mysqli_num_rows($entradas) >= 1){
            $result = $entradas;
        }
       
        return $result;
    }
    
    function conseguirEntrada ($conexion,$id){
        $query = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ' , u.apellido) AS usuario ". 
                 "FROM entradas e ".
                 "INNER JOIN categorias c ON e.categoria_id = c.id ".
                 "INNER JOIN usuarios u ON e.usuario_id = u.id ".
                 "WHERE e.id = '$id'";
        $entrada = mysqli_query($conexion,$query);
        $resultado = array();
        if ($entrada && mysqli_num_rows($entrada) >= 1){
            $resultado = mysqli_fetch_assoc($entrada);
        }
        return $resultado;
    }


    function escaparDatos ($conexion , $datos){
        $datosescapados = $datos;
        $datosescapados = htmlspecialchars($datosescapados);
        $datosescapados = mysqli_real_escape_string($conexion,$datosescapados);
        return $datosescapados;
    }

    function comprobarUpdateForm ($conexion,$datos,$isEmail){
        $resultado = false;
        $datos = trim($datos);
        if (strlen($datos)>0)       
            if ($isEmail){
                if ($datos == $_SESSION["usuario"]["email"]){
                    $resultado = false;   
                } else {    
                    $datos = escaparDatos($conexion, $datos);
                    $resultado = $datos;
                }
            } else {
                $datos = strtolower($datos);
                if($datos == $_SESSION["usuario"]["nombre"] || preg_match("/[0-9\W]/",$datos)){
                    $resultado = false;
                    
                } elseif ($datos == $_SESSION["usuario"]["apellido"] || preg_match("/[0-9\W]/",$datos)) {
                    $resultado = false;
                } else {
                    $resultado = $datos;
                }   
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    function cifrarPassword($conexion,$pass1,$pass2){
        $pass1 = trim($pass1);
        $pass2 = trim($pass2);

        if (strlen($pass1) > 0 && strlen($pass2) > 0){
            if ($pass1 == $pass2){
                $password_cifrada = password_hash($pass1, PASSWORD_BCRYPT, ['cost' => 4]);
                return $password_cifrada;
            } else {
                return false;
            }
        } else {
            return false ;
        }

        
    }

    function updateDataUser ($conexion,$campo,$datos,$id){
        $query = "UPDATE usuarios SET $campo = '$datos' WHERE id = $id; ";
        $resultado = mysqli_query($conexion,$query);

        if ($resultado){
            $query = "SELECT * FROM usuarios WHERE id = $id";
            $login = mysqli_query($conexion,$query);
            $usuario = mysqli_fetch_assoc($login); 
            return  $usuario;
        } else {
            return false;
        }
    }

?>