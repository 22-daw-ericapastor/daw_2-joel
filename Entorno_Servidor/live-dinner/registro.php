<?php
session_start();
if(isset($_POST['nombre'])||isset($_POST['apellido1'])||isset($_POST['apellido2'])||isset($_POST['email'])||isset($_POST['edad'])||isset($_POST['telefono'])){

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
$sql = "SELECT * FROM $tbl_name WHERE Nombre = '$username'";

$result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
	 // Si es mayor a cero imprimimos que ya existe el usuario
  	echo "Ya existe el registro que intenta registrar";
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos

// Preparar
$stmt = $conexion->prepare("INSERT INTO $tbl_name (nombre, contrasena, apellido1, apellido2, email, edad, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssssii', $username, $password,$apellido1,$apellido2,$email,$edad,$telefono);
// Establecer parámetros y ejecutar
$password = $_POST['contrasena'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
//$stmt->execute();


if ($stmt->execute()) {

      echo "New record created successfully";
      
} else {
      //Imprimir una variable de sesion con el error y despues en el registro y ridirigir al registro
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      echo '<a href=registro.php">Accede al registro</a>';
}
}
// Cerramos la conexión
$conexion->close();
}else{
header('Location: index.php');
}









 
?>