<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "practica";
$tbl_name = "admin";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
$conexion->set_charset("utf8");
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
   }
?>