<?php
session_start();
require 'conexion.php';
require '../superCifrador.php';
if(isset($_POST['username']) && $_POST['password']){

$username = $_POST['username'];
$password = $_POST['password'];

$usuario = filter_var($username, FILTER_SANITIZE_STRING);
$contrasena = filter_var($password,  FILTER_SANITIZE_STRING);

$cifrado = new Cifrados;
$nombre_cifrado = $cifrado->cifra($usuario);
$contrasena_hash = $cifrado->hasea($contrasena);

$consulta = $dbh->prepare("INSERT INTO usuario (Nombre, Contrasena) VALUES (:nombre, :contrasena)");
$consulta->bindParam(':nombre', $nombre_cifrado);
$consulta->bindParam(':contrasena', $contrasena_hash);

if($consulta->execute()){
      $_SESSION['nombre'] = $nombre_cifrado;
      header("Location: index.php");
     
}else{
      echo "Error";
}


}else{

      header("Location: index.php"); 
}

$dbh=null;

 ?>