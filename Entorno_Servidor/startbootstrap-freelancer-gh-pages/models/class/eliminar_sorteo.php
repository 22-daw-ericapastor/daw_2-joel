<?php
class Limpiar{
    function limpiar_sorteo(){
        require('../models/conexion.php');
        
        $query = "DELETE FROM rifa WHERE 1";

if (mysqli_query($conexion,$query)) {
      $sql = "ALTER TABLE rifa AUTO_INCREMENT = 1";
      
    if($conexion->query($sql)){
        header('Location: ../index.php');
    }
} else {
    header('Location: ../views/listado_ganadores.php');

}

    }
}
?>