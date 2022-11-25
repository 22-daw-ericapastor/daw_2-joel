<?php
session_start();
if(isset($_SESSION['nick']) && isset($_POST['contrasena_A']) && isset($_POST['contrasena_N']) && isset($_POST['contrasena_R'])){

    require('conexion.php');
    header('Content-type: text/html; charset=utf-8');

    $username = $_SESSION['nick'];
    $contrasena_A = $_POST['contrasena_A'];
    $contrasena_N = $_POST['contrasena_N'];
    $contrasena_R = $_POST['contrasena_R'];
    $sql = "SELECT * FROM $tbl_name WHERE nick = '$username' and contrasena='$contrasena_A'";

    $result = $conexion->query($sql);

 // Validamos si hay resultados
 if(mysqli_num_rows($result) == 1)
 {
    $resultados = $result->fetch_array();

    if($resultados['nick'] == $username && $resultados['contrasena'] == $contrasena_A){

        //UPDATE

    $stmt = $conexion->prepare("UPDATE $tbl_name SET contrasena=? WHERE nick=?");
    $stmt->bind_param('ss', $contrasena_R, $username);
    if($stmt -> execute()){
        $_SESSION['contrasena'] = $contrasena_R;

        $_SESSION['cont_correcta'] = 1;
		header('Location: ../cambiar_contrasena.php');
        //echo("Se ha actualizado corretamente");
        
    }else{
        $_SESSION['error_cont'] = 1;
        header('../cambiar_contrasena.php');
    }

     }else{

        $_SESSION['error']=1;
        header('Location: ../login.php');

     }
 }else{

 }
    

}else{
    header('Location: ../index.php');
}
?>