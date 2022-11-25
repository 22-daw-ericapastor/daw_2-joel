<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "prueba";
$tbl_name = "usuario";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}



$username = $_POST['username'];
$password = $_POST['password'];


$sql = "UPDATE $tbl_name SET contrasena='$password' WHERE nombre='$username'";
$_SESSION['password']=$password;



if (mysqli_query($conexion, $sql)) {
      echo "New record created successfully";
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      echo '<a href=registro.php">Accede al registro</a>';
}

header("Location: perfil.php");


?>