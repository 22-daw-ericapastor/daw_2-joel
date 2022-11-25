<?php
session_start();
if(isset($_SESSION['nombre'])){

	if(isset($_POST['nick']) && isset($_POST['contrasena'])){

		//print_r($_POST);



		require('conexion.php');

		$username = $_POST['nick'];
 		$password = $_POST['contrasena'];

 		

$stmt = $conexion->prepare("DELETE FROM usuarios WHERE nick = ? and contrasena=?");
$stmt->bind_param('ss', $username, $password);
 

if ($stmt->execute()) {
      //echo "Perfil eliminado";
	$_SESSION['eliminado'] = 1;
	header('Location: ../index.php');

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);

}





// Cerramos la conexión
$stmt->close();







 }
 else
 {
    echo"Error en la contraseña o usuario";
}








}else{
	header('Location: ../index.php');
}

?>