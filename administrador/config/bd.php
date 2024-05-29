<?php 
//////////////////////////////conexion
$host="localhost";
$bd="libreriaExpress";
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

?>