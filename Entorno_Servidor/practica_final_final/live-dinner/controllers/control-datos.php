<?php
session_start();
if(isset($_POST['nombre']) && isset($_POST['apellido1']) && isset($_POST['apellido2']) && isset($_POST['correo']) && isset($_POST['edad']) && isset($_POST['telefono'])){

    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');

    $nick = $_SESSION['nick'];
    $nombre_nuevo = $_POST['nombre'];
    $apellido_nuevo1 = $_POST['apellido1'];
    $apellido2_nuevo2 = $_POST['apellido2'];
    $correo_nuevo = $_POST['correo'];
    $edad_nuevo = $_POST['edad'];
    $telefono_nuevo = $_POST['telefono'];


    $stmt = $conexion->prepare("UPDATE $tbl_name SET nombre=?, apellido1=?, apellido2=?, correo=?, edad=?, telefono=? WHERE nick=?");
    $stmt->bind_param('ssssiss', $nombre_nuevo, $apellido_nuevo1,$apellido2_nuevo2,$correo_nuevo,$edad_nuevo,$telefono_nuevo,$nick);
    if($stmt -> execute()){
        $_SESSION['nombre'] = $nombre_nuevo;
        $_SESSION['apellido1'] = $apellido_nuevo1;
		$_SESSION['apellido2'] = $apellido2_nuevo2;
		$_SESSION['edad'] = $edad_nuevo;
		$_SESSION['correo'] = $correo_nuevo;
		$_SESSION['telefono'] = $telefono_nuevo;
        $_SESSION['datos_nuevos'] = 1;
		header('Location: ../gestionar_perfil.php');
        //echo("Se ha actualizado corretamente");
        
    }else{
        $_SESSION['error_actualizar'] = 1;
        header('../gestionar_perfil.php');
    }

}else{
    header('Location: ../index.php');
}
?>