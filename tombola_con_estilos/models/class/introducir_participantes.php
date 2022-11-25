<?php
 
class Participantes
{
    function introducir_participantes($nombre, $apellido1, $apellido2) {
        require ('../models/conexion.php');


       for($i=0; $i<count($nombre); $i++){
        $nombres = $nombre[$i];
        $apellidos1 = $apellido1[$i];
        $apellidos2 = $apellido2[$i];

        $sql = "SELECT * FROM rifa
        WHERE nombre = '$nombres'";

       $result = $conexion->query($sql);

       if(mysqli_num_rows($result)>=0){

        $resultados = $result->fetch_array();



        if($resultados['nombre'] == $nombres){

            header('Location: ../views/participantes.php');
            
        }else{
            $stmt = $conexion->prepare("INSERT INTO rifa (nombre, apellido1, apellido2) VALUES (?, ?, ?)");
       $stmt->bind_param('sss', $nombres, $apellidos1, $apellidos2);

       if($stmt->execute()){
               header('Location: ../views/participantes.php');
           }else{
               echo"NO se ha insertado";
           }
        }
           
       }
       
       }

    }

}

?>