<?php
/* guardamos en una variable de sesion, cuando el usuario se ha logueado*/
if (!isset($_SESSION['actividad'])) {
$_SESSION['actividad'] = time();
}
//contador en minutos
$minutos = 5;
//contador en segundos
$segundos = $minutos * 60; 

if (isset($_SESSION['actividad'])) {
    $sesion_inactiva = time() - $_SESSION['actividad'];
        //Si pasa mas del tiempo de espera se cierra la sesion
        if ($sesion_inactiva >= $segundos) {
            session_destroy();
            header("Location: index.php");
        }
        //Si no pasa más del tiempo de espera se actualiza el tiempo de sesion
        elseif ($sesion_inactiva < $segundos) {
            $_SESSION['actividad'] = time();
        }
    }
?>
