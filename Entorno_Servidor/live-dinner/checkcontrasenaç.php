<?php
session_start();
if(isset($_POST['contrasena'])){

      //guardar los datos en una variable de sesion para mostrarlos y despues en eliminar cuenta hacer un unset despues de darle a confirmar
      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "practica";
      $tbl_name = "usuarios";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
      $usuario = $_SESSION['nombre'];
 $password = $_POST['contrasena'];
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$usuario' and  contrasena='$password'";

$result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result) == 1)
 {
       // Si es mayor a cero imprimimos que ya existe el usuario
      //echo "Existe el usuario";
      $_SESSION['contras'] = 1;
      //$_SESSION['usuario'] = $_POST['nombre'];
      //$_SESSION['contrasena'] = $_POST['contrasena'];
      header('Location: eliminarcuenta.php');
 }
 else
 {
    echo"Error en la contraseña o usuario";
}
// Cerramos la conexión
$conexion->close();





}else{
      echo"Los campos estan vacíos";
}
?>