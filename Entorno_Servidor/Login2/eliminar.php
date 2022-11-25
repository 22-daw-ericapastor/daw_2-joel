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
$tbl_name = "Usuario";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_SESSION['username'];


//$sql = "UPDATE $tbl_name SET Contrasena='$password' WHERE Nombre='$username'";

$sql = "Delete From $tbl_name Where nombre='$username'";

if (mysqli_query($conexion, $sql)) {
      echo "Perfil eliminado";
      session_destroy();
      echo "<script>
                Perfil eliminado);
                window.location= 'index.php'
    </script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      echo "<script>
                Perfil NO eliminado);
                window.location= 'index.php'
    </script>";
}



?>