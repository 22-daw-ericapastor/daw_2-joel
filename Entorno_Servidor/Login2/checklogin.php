<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "prueba";
$tbl_name = "Usuario";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);



if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

 
$sql = "SELECT * FROM $tbl_name WHERE Nombre = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);

 
 if ($password == $row['contrasena']) { 
 //if (password_verify($password, $row['Contrasena'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    
    
    header("Location: index.php");
    
     
    

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>

