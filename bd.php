<?php 

//////////////////////////////conexion

$host="localhost";

$bd="id22148080_libreria";

$usuario="id22148080_admin";

$contrasenia = "Mufasa1511$";



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