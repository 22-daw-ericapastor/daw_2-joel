<?php
session_start();
if(isset($_POST['nick']) && isset($_POST['contrasena'])){

    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');

    $nick = $_POST['nick'];
    $contrasena = $_POST['contrasena'];

    if($nick == $_SESSION['nick'] && $contrasena == $_SESSION['contrasena']){

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