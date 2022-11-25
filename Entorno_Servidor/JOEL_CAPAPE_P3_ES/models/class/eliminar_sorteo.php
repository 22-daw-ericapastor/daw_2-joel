<?php
/**
* Clase Limpiar, que define para limpiar la tabla de la base de datos
*

* @author Joel Capape Hernández
* @copyright Toda está aplicación tiene copyright

*
*/
class Limpiar{

    /**
     * Funcion limpiar_sorteo que servirá para limpiar la tabla para realizar sorteos futuros
     */
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