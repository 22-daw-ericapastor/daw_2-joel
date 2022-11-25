<?php
class Sorteo
{
  function realizar_sorteo(){
     require('../models/conexion.php');
     
     $sql = "select count(id) as num from rifa where 1";

    $result = $conexion->query($sql);

    $resultados = $result -> fetch_array();

    //guardo el numero de participantes
    /*
     Despues del delete esto -> ALTER TABLE rifa AUTO_INCREMENT = value;
    */
    $num_participantes = $resultados['num'];

    //Con esta variable guardo los participantes de la rifa
    srand (time());

    $array_id_ganadores = array();
 
    
    for($i = 12;$i>count($array_id_ganadores);$i--){
        $numero_aleatorio = rand(1,$num_participantes);
        if(!in_array($numero_aleatorio, $array_id_ganadores)){
            //si el participante no estaba en el array, entonces lo meto dentro de los ganadores.
            array_push($array_id_ganadores, $numero_aleatorio);
         }

         

    }



    $ssql = "select * from rifa where id in (" . implode(",", $array_id_ganadores) . ")";

    $result2 = $conexion->query($ssql);

    $array_nombres = array();
    
    foreach ($result2 as $usuario): 
        array_push($array_nombres, $usuario);
    endforeach;
    return $array_nombres;

  }  
}

?>