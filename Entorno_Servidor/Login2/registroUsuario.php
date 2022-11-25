<?php

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

echo $username;
echo "<br>";
echo $password;

$result = $conexion->query($sql);
$sql = "INSERT INTO $tbl_name (Nombre, Contrasena) VALUES ('$username', $password)";




if (mysqli_query($conexion, $sql)) {
      echo "New record created successfully";
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      echo '<a href=registro.php">Accede al registro</a>';
}

header("Location: index.php");

 ?>