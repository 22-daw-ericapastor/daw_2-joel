<?php
session_start();
//decir si existen las variables de sesion mirar el ejemplo de sesiones con lo de actualizar contraseña
if( isset($_POST['apellido1']) && isset($_POST['apellido2']) && isset($_POST['edad']) && isset($_POST['email']) && isset($_POST['telefono'])){
 
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
$apellido_nuevo1 = $_POST['apellido1'];
$apellido_nuevo2 = $_POST['apellido2'];
$edad_nueva = $_POST['edad'];
$email_nuevo = $_POST['email'];
$telefono_nuevo = $_POST['telefono'];

$sql = "UPDATE $tbl_name SET apellido1=?, apellido2=?, email=?, edad=?, telefono=? WHERE nombre=?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param('sssiis', $apellido_nuevo1, $apellido_nuevo2, $email_nuevo, $edad_nueva, $telefono_nuevo, $usuario);

    if($stmt -> execute()){
		$_SESSION['apellido1'] = $apellido_nuevo1;
		$_SESSION['apellido2'] = $apellido_nuevo2;
		$_SESSION['edad'] = $edad_nueva;
		$_SESSION['email'] = $email_nuevo;
		$_SESSION['telefono'] = $telefono_nuevo;
		header('Location: gestionarPerfil.php');
        echo("Se ha actualizado corretamente");
    }else{
        echo("Ha ocurrido un error en el actualizar");
    }



}else{
	header('Location: gestionarPerfil.php');
}
?>