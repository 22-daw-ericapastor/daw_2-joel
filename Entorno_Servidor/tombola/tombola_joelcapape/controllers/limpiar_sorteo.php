<?php
if(isset($_POST['enviar'])){

    include('../models/class/eliminar_sorteo.php');

    $eliminar = new Limpiar;

    $eliminar ->limpiar_sorteo();

}else{
    header('Location: ../views/listado_ganadores.php');
}
?>