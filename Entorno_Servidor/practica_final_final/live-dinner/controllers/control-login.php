<?php
session_start();
if(isset($_POST['nick']) && isset($_POST['contrasena'])){
    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');
    $username = $_POST['nick'];
    $password = $_POST['contrasena'];
    $sql = "SELECT * FROM $tbl_name WHERE nick = '$username' and contrasena='$password'";

    $result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result) == 1)
 {
    $resultados = $result->fetch_array();

    if($resultados['nick'] == $username && $resultados['contrasena'] == $password){
        $_SESSION['id_usuario'] = $resultados['id'];
        $_SESSION['nick'] = $resultados['nick'];
        $_SESSION['contrasena'] = $resultados['contrasena'];
        $_SESSION['nombre'] = $resultados['nombre'];
        $_SESSION['apellido1'] =  $resultados['apellido1'];
        $_SESSION['apellido2'] =  $resultados['apellido2'];
        $_SESSION['correo'] =  $resultados['correo'];
        $_SESSION['edad'] = $resultados['edad'];
        $_SESSION['telefono'] = $resultados['telefono'];
         
      header('Location: ../index.php');

     }else{

        $_SESSION['error']=1;
        header('Location: ../login.php');

     }
 }
 else
 {
    $_SESSION['error']=1;
    header('Location: ../login.php');

}
// Cerramos la conexión
$conexion->close();

}else{
    header('Location: ../login.php');
}
?>