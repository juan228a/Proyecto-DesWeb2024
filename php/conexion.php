<?php

$server = "localhost";
$user = "root";
$pass = "";
$db= "projectofinal_db";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_error) {
    die ("conexion fallida" . $conexion-> connect_error);
} else {
    //echo "conectado";
}
?>