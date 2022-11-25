<?php
session_start();
if(isset($_POST['opciones']) && isset($_POST['mensaje'])){

    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');

    $opcion = $_POST['opciones'];
    $mensaje = $_POST['mensaje'];
    $atendida = 0;
    $id_usuario = $_SESSION['id_usuario'];

    $stmt = $conexion->prepare("INSERT INTO comentarios (tipo, comentario, atendida, id_usuario) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssii', $opcion, $mensaje,$atendida,$id_usuario);

    if ($stmt->execute()) {

        $_SESSION['mensaje_creado'] = 1;
        header('Location: ../crear_mensaje.php');
        
  } else {
        //Imprimir una variable de sesion con el error y despues en el registro y ridirigir al registro
        $_SESSION['error_mensaje'] = 1;
        header('Location: ../crear_mensaje.php');
  }


}else{
    header('Location: ../index.php');
}
?>
