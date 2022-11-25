<?php
if(isset($_POST['nombre']) && isset($_POST['contrasena'])){
    
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "practica";
$tbl_name = "usuarios";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);


if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
 $username = $_POST['nombre'];
 $password = $_POST['contrasena'];
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$username' and contrasena='$password'";

$result = $conexion->query($sql);




 // Validamos si hay resultados
 if(mysqli_num_rows($result) == 1)
 {
    $resultados = $result->fetch_array();
        $_SESSION['nombre'] = $resultados['nombre'];
        $_SESSION['contrasena'] = $resultados['contrasena'];
         $_SESSION['apellido1'] =  $resultados['apellido1'];
         $_SESSION['apellido2'] =  $resultados['apellido2'];
         $_SESSION['email'] =  $resultados['email'];
         $_SESSION['edad'] = $resultados['edad'];
         $_SESSION['telefono'] = $resultados['telefono'];
         
      header('Location: index.php');

    
 }
 else
 {
    echo"Error en la contraseña o usuario";
}
// Cerramos la conexión
$conexion->close();


}else{
    header('Location: index.php');
}
?>
