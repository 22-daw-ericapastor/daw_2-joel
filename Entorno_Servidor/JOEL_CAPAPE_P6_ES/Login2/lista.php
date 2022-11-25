<?php

session_start();

if(isset($_SESSION['username'])){



require 'conexion.php';
require '../superCifrador.php';

$sql = "Select * From Usuario ";

$stmt = $dbh->prepare($sql);
$stmt->execute();






$i = 0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $cifrados = new Cifrados;
    $result['Nombre'] = $cifrados->descrifra($row['Nombre']);
    $result['Contrasena'] = $row['Contrasena'];
    echo $result['Nombre'];
    echo $result['Contrasena'];
    $lista[$i]=$result;
    echo "<br>";
    $i= $i + 1;
}


$_SESSION['lista'] = $lista;


        
        
        
header("Location: listaUsuarios.php"); 

}else{
    header("Location: index.php");
}

?>

