<?php

if(isset($_SESSION['nombre'])){ 

	require('conexion.php');


	$sql = "SELECT * FROM usuarios";

	$result = $conexion->query($sql);

	//print_r($result);
	 if(mysqli_num_rows($result)>= 0)
 {


       while ( $resultados = $result->fetch_array()) {
   		$dato['nick'] = $resultados['nick'];
   		$dato['contrasena'] = $resultados['contrasena'];
   		$dato['nombre'] = $resultados['nombre'];
   		$dato['apellido1'] = $resultados['apellido1'];
   		$dato['apellido2'] = $resultados['apellido2'];
   		$dato['correo'] = $resultados['email'];
   		$dato['edad'] = $resultados['edad'];
   		$dato['telefono'] = $resultados['telefono'];

   		$datos_usuarios[] = $dato;

   		
}
//print_r($datos_usuarios);

 }



}else{
	header('Location: ../index.php');
}

?>