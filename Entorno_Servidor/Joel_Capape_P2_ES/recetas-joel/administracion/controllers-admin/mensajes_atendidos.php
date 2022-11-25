<?php 



	if(isset($_POST['id_comentario'])){


		$id_comentario = $_POST['id_comentario'];

		require('conexion.php');

		header('Content-type: text/html; charset=utf-8');

 


$atendida = 1;


	$update = "UPDATE comentarios SET atendida=? WHERE id_comentarios=?";

		    $stmt = $conexion->prepare($update);

		    $stmt->bind_param('ii', $atendida, $id_comentario);

		    if($stmt -> execute()){

		    	header('Location: ../leer_mensajes_usuarios.php');

		    }else{

		    }






	}else{

	}



?>