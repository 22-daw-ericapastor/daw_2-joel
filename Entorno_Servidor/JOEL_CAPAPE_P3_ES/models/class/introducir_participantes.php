<?php
/**
* Clase Participantes, que define que a unos participantes
*
* En la aplicación una persona constará de un nombre, una edad y un sexo.

* @param array $nombre Representará el nombre de un participante en la base de datos de una persona en la aplicación
* @param array $apellido1 Representará el apellido de una persona en la base de datos
* @param array $apellido2 Representará el segundo apellido de una persona en la base de datos
*
*/
class Participantes
{
    /**
     * Funcion introducir_participantes que introduce los participantes en la base de datos
     * @param array $nombre array que guarda los nombres de los participantes
     * @param array $apellido1 array que guarda el primer apellido de los participantes
     * @param array $apellido2 array que guarda el segundo apellido de los participantes
     */
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