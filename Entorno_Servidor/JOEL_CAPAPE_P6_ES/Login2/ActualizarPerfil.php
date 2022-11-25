<?php

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['password']) && isset($_POST['password2'])){

      if($_POST['password'] == $_POST['password2']){




      $username = $_SESSION['username'];
      $password = $_POST['password2'];

      $usuario = filter_var($username, FILTER_SANITIZE_STRING);
      $contrasena = filter_var($password,  FILTER_SANITIZE_STRING);
      
      require 'conexion.php';
      require '../superCifrador.php';

      $cifrado = new Cifrados;

      $contrasena_hash = $cifrado->hasea($contrasena);

      $sql = "UPDATE Usuario SET Contrasena=? WHERE Nombre=?";
      $stmt= $dbh->prepare($sql);

      if($stmt->execute([$contrasena_hash,$usuario])){
            $_SESSION['actualizada'] = 1;
            header("Location: perfil.php");
      }else{
            header("Location: perfil.php");
      }


      }else{
            $_SESSION["no_coincide"]=1;
            header("Location: perfil.php");
      }

      


}else{

      header("Location: index.php");
}




/*$sql = "UPDATE $tbl_name SET Contrasena='$password' WHERE Nombre='$username'";



if (mysqli_query($conexion, $sql)) {
      echo "New record created successfully";
	  $_SESSION['password'] = $password;
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      echo '<a href=registro.php">Accede al registro</a>';
}

header("Location: perfil.php");*/


?>