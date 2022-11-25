<?php
session_start();
?>

<?php
if(isset($_POST['username']) && $_POST['password']){
require 'conexion.php';
require '../superCifrador.php';
$cifrados = new Cifrados;
$username = $_POST['username'];
$password = $_POST['password'];

$usuario = filter_var($username, FILTER_SANITIZE_STRING);
$contrasena = filter_var($password,  FILTER_SANITIZE_STRING);

$nombre_cifrado = $cifrados->cifra($usuario);
 
$stmt = $dbh->prepare("SELECT * FROM usuario WHERE Nombre=?");
$stmt->execute([$nombre_cifrado]); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if (empty($row)) {     
 }





 if ($cifrados->validahash($row['Contrasena'],$contrasena)) { 
 //if (password_verify($password, $row['Contrasena'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $row['Nombre'];
    $_SESSION['password'] = $row['Contrasena'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    
    
    header("Location: index.php");
    
     
    

 } else { 
   $_SESSION['error']=1;
   header("Location: index.php");
 }
}else{
  header("Location: index.php");
}
$dbh = null;
 ?>

