<?php 
//////////////////////////////conexion
$host="localhost";
$bd="sitio";
$usuario="root";
$contrasenia = "";

try {
    
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    if ($conexion) {
        //echo "Conectado al Sistema";
    }

} catch (Exception $ex) {
    echo $ex->getMessage();
}
/////////////////////////////////////////

//Base de datos en hosting
/*
$host="localhost";
$bd="id22148080_sitio";
$usuario="id22148080_usuario";
$contrasenia = "Mufasa1511$";
*/

?>