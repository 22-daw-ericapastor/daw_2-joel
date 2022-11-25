<?php
session_start();
if(isset($_POST['nick'])&& isset($_POST['contrasena']) && isset($_POST['nombre']) && isset($_POST['apellido1']) && isset($_POST['apellido2']) && isset($_POST['correo']) && isset($_POST['edad']) && isset($_POST['telefono'])){
    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');
    //print_r($_POST);
    $username = $_POST['nick'];
$sql = "SELECT * FROM $tbl_name WHERE nick = '$username'";

$result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result)==1)
 {
    $resultados = $result->fetch_array();

    if($resultados['nick'] == $username){

        echo"YA EXISTE ESTE NICK";
        $_SESSION['nick_repetido'] = 1;
        header('Location: ../registro.php');

     }
 }
 else
 {
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $stmt = $conexion->prepare("INSERT INTO $tbl_name (nick, contrasena, nombre, apellido1, apellido2, correo, edad, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssis', $username, $contrasena,$nombre,$apellido1,$apellido2,$correo,$edad,$telefono);

    if ($stmt->execute()) {

        $_SESSION['registro_correcto'] = 1;
        header('Location: ../registro.php');
        
  } else {
        //Imprimir una variable de sesion con el error y despues en el registro y ridirigir al registro
        $_SESSION['error_registro'] = 1;
        header('Location: ../registro.php');
  }

 }

}else{
header('Location: ../index.php');
}









 
?>