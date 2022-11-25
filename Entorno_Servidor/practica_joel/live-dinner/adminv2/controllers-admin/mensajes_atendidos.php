<?php 



	if(isset($_POST['id_comentario'])){


		$id_comentario = $_POST['id_comentario'];

		header('Content-type: text/html; charset=utf-8');
 
$hostname = 'localhost';
$database = 'practica';
$username = 'root';
$password = '';
$tbl_name = "comentarios";

$atendida = 1;


$mysqli = new mysqli($hostname,$username,$password,$database);

	$update = "UPDATE comentarios SET atendida=? WHERE id_comentarios=?";

		    $stmt = $mysqli->prepare($update);

		    $stmt->bind_param('ii', $atendida, $id_comentario);

		    if($stmt -> execute()){

		    	header('Location: ../leer_mensajes_usuarios.php');

		    }else{

		    }






	}else{

	}



?>