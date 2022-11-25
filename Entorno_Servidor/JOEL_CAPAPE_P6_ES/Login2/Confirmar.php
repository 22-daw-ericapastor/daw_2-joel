<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])){

 
  require 'conexion.php';
  require '../superCifrador.php';

    $username = $_SESSION['username'];
    $password = $_POST['password'];
  
    $usuario = filter_var($username, FILTER_SANITIZE_STRING);
    $contrasena = filter_var($password,  FILTER_SANITIZE_STRING);
    
$sql = "Select * From Usuario Where Nombre = ?";

$stmt = $dbh->prepare($sql);

if($stmt->execute([$usuario])){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


   $cifrados = new Cifrados;


   if($cifrados->validahash($row['Contrasena'],$contrasena)){
       $_SESSION['cambiar'] = 1;
       header("Location: perfil.php");
   }else{
       $_SESSION['cont_no'] = 1;
    header("Location: perfil.php");
   }

}else{
    header("Location: index.php");
}


}else{
    header("Location: index.php");
}
?>