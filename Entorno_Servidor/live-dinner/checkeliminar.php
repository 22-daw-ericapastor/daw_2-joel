
<?php
session_start();
if(isset($_SESSION['contrasena'])){

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
$username = $_SESSION['nombre'];
 $password = $_SESSION['contrasena'];

$sql = "Delete From $tbl_name Where nombre='$username' and contrasena='$password'";

if (mysqli_query($conexion, $sql)) {
     // echo "Perfil eliminado";
      	unset($_SESSION['contras']);
        unset($_SESSION['contrasena']);
      session_destroy();
      header('Location: index.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);

}
// Cerramos la conexión
$conexion->close();





}else{
      echo"Los campos estan vacíos";
}
?>
