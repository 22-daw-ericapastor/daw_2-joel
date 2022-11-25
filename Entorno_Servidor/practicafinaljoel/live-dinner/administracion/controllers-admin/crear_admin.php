<?php
session_start();
if(isset($_POST['usuario_admin']) || isset($_POST['contrasena']) || isset($_POST['tlf_contacto']) || isset($_POST['persona']) ){

	require('conexion.php');

$usuario = $_POST['usuario_admin'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['tlf_contacto'];
$p_contacto = $_POST['persona'];
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$usuario'";

$result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
	 // Si es mayor a cero imprimimos que ya existe el usuario
  	echo "Ya existe el nombre de administrador que intenta registrar";
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos

 	$stmt = $conexion->prepare("INSERT INTO $tbl_name (nombre, contrasena, telefono, persona_de_contacto) VALUES (?, ?, ?, ?)");
	$stmt->bind_param('ssis', $usuario, $contrasena, $telefono, $p_contacto);
// Establecer parámetros y ejecutar



if ($stmt->execute()) {
      //echo "New record created successfully";
		$_SESSION['admin_creado'] =1;
		//print_r($_SESSION);
		header('Location: ../crear_administrador.php');
      
}
}
}else{
	header('Location: ../administracion.php');
}
?>