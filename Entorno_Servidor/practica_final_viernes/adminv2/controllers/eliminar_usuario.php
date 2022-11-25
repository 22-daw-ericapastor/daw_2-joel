<?php
session_start();
if(isset($_SESSION['nombre'])){

	if(isset($_POST['nick'])){

		//print_r($_POST);



		require('conexion.php');

		$username = $_POST['nick'];

		$sql = "SELECT id FROM usuarios WHERE nick = '$username'";

    	$result = $conexion->query($sql);

		$id_usuario = $result->fetch_array(MYSQLI_ASSOC);
		$id=$id_usuario['id'];

		$stmt = $conexion->prepare("DELETE FROM comentarios WHERE id_usuario = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$stmt = $conexion->prepare("DELETE FROM comentarios_recetas WHERE id_usuario = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();



 		

$stmt = $conexion->prepare("DELETE FROM usuarios WHERE nick = ?");
$stmt->bind_param('s', $username);
 

if ($stmt->execute()) {
      //echo "Perfil eliminado";
	$_SESSION['eliminado'] = 1;
	header('Location: ../eli_usuario.php');

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