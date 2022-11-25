<?php

session_start();
require'conexion.php';
if(isset($_SESSION['username'])){

      $nombre = $_SESSION['username'];

$sql = 'DELETE FROM usuario
        WHERE Nombre = :nombre';

// prepare the statement for execution
$consulta = $dbh->prepare($sql);
$consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);

// execute the statement
if ($consulta->execute()) {
      session_destroy();
      header('Location: index.php');
}

}else{
      header('Location:index.php');
}
$dbh = null;


?>