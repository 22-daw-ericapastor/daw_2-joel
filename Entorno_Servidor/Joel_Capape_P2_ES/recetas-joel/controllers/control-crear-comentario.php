<?php
session_start();
if(isset($_SESSION['nick'])){
    if(isset($_POST['puntuacion']) && isset($_POST['mensaje_com'])){

        require('conexion.php');
        header('Content-type: text/html; charset=utf-8');

        $usuario=$_SESSION['nick'];
        $puntuacion=$_POST['puntuacion'];
        $comentario=$_POST['mensaje_com'];
        $id_usuario = $_SESSION['id_usuario'];
        $id_receta = $_SESSION['id_receta'];

        $stmt = $conexion->prepare("INSERT INTO comentarios_recetas (nombre_usuario, puntuacion, id_usuario, id_receta, comentario_rec) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('siiis', $usuario,$puntuacion,$id_usuario,$id_receta,$comentario);

    if ($stmt->execute()) {

        $_SESSION['mensaje_creado'] = 1;
        header('Location: ../receta-info.php');
        
  } else {
        //Imprimir una variable de sesion con el error y despues en el registro y ridirigir al registro
        $_SESSION['error_mensaje'] = 1;
        header('Location: ../receta-info.php');
  }
        
}else{
        echo("No se han completado los campos obligatorios");
    }

}else{
    header('Location: ../index.php');
}
?>