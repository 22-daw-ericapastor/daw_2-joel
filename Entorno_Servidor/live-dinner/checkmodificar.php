<?php
session_start();
if(isset($_POST['contrasenaAnt']) && isset($_POST['contrasenaNue']) && isset($_POST['contrasenaNue'])){
   // print_r($_POST);

    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "practica";
    $tbl_name = "usuarios";



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
   }

   $password = $_POST['contrasenaAnt'];
   $usuario = $_SESSION['nombre'];
   $sql = "SELECT * FROM $tbl_name WHERE contrasena='$password' and nombre='$usuario'";
   $passwordNueva = $_POST['contrasenaNue'];
   $result = $conexion->query($sql);
   print_r($result);
   if(mysqli_num_rows($result) == 1)
 {
	 
    //echo("EXISTE LA CONTRASEÑA");
    $sql = "UPDATE $tbl_name SET contrasena=? WHERE nombre=?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param('ss', $passwordNueva, $usuario);

    if($stmt -> execute()){
        echo("Se ha actualizado corretamente");
    }else{
        echo("Ha ocurrido un error en el actualizar");
    }


 }else{
     echo("Ha ocurrido un error");
 }
 
}else{
    //ha ocurrido un error
}
?>