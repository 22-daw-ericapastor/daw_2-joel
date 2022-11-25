<?php
session_start();
if(isset($_SESSION['nombre'])){

if(isset($_POST['idcomentario'])){

	$id_comentario = $_POST['idcomentario'];

	print_r($id_comentario);

	require('conexion.php');

	$stmt = $conexion->prepare("DELETE FROM comentarios WHERE id_comentarios = ?");
        $stmt->bind_param('i', $id_comentario);

       if ($stmt->execute()) {
      //echo "Perfil eliminado";
	$_SESSION['comentario_eliminado'] = 1;
	header('Location: ../buttons.php');

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);

}

}else{
	echo("NO EXISTE EL COMENTARIO A BORRAR");
}

}else{
	header('Location: ../views/login.php');
}
?>