<?php
session_start();
if(isset($_POST['nombre']) && isset($_POST['contrasena'])){
    require('conexion.php');

    $username = $_POST['nombre'];
    $password = $_POST['contrasena'];
    $sql = "SELECT * FROM $tbl_name WHERE nombre = '$username' and contrasena='$password'";

    $result = $conexion->query($sql);




 // Validamos si hay resultados
 if(mysqli_num_rows($result) == 1)
 {
    $resultados = $result->fetch_array();
    if($resultados['nombre'] == $username && $resultados['contrasena'] == $password){
        $_SESSION['nombre'] = $resultados['nombre'];
        $_SESSION['contrasena'] = $resultados['contrasena'];
         
      header('Location: ../administracion.php');

    }else{

        $_SESSION['error']=1;
         header('Location: ../views-admin/login-admin.php');


    }
      

    
 }
 else
 {
    $_SESSION['error']=1;
    header('Location: ../views-admin/login-admin.php');

}
// Cerramos la conexión
$conexion->close();

}else{
    header('Location: ../views-admin/login-admin.php');
}
?>