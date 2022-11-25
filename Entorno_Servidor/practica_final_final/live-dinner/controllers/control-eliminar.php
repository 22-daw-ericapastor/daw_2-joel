<?php
session_start();
if(isset($_POST['nick']) && isset($_POST['contrasena'])){

    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');

    $nick = $_POST['nick'];
    $contrasena = $_POST['contrasena'];

    if($nick == $_SESSION['nick'] && $contrasena == $_SESSION['contrasena']){

        $sql = "SELECT id FROM usuarios WHERE nick = '$nick'";

        $result = $conexion->query($sql);

        $id_usuario = $result->fetch_array(MYSQLI_ASSOC);
        $id=$id_usuario['id'];

        $stmt = $conexion->prepare("DELETE FROM comentarios WHERE id_usuario = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $stmt = $conexion->prepare("DELETE FROM comentarios_recetas WHERE id_usuario = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt = $conexion->prepare("DELETE FROM $tbl_name WHERE nick = ? and contrasena=?");
        $stmt->bind_param('ss', $nick, $contrasena);


    if($stmt -> execute()){

		header('Location: cerrar_sesion.php');
        //echo("Se ha actualizado corretamente");
        
    }else{
        $_SESSION['error_eliminar'] = 1;
        header('Location: ../eliminar_cuenta.php');
    }



    }


}else{
    header('Location: ../index.php');
}
?>