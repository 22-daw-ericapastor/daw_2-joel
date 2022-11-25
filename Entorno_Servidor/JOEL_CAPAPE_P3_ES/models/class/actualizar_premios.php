<?php
/**
* Clase Actualizar, que define que persona ha ganado un premio
*
* En la aplicación una persona constará de un nombre, una edad y un sexo.

* @author Joel Capape Hernández
* @copyright Toda está aplicación tiene copyright
* @param array $id_ganadores Representará la id de la base de datos de una persona en la aplicación
* @param array $premios Representará un array de premios que las personas podrán ganar
*
*/
class Actualizar{
    /**
	* Funcion que asigna un premio a un usuario.
	*  
	* @param array $id_ganadores Representará la id de la base de datos de una persona en la aplicación
    * @param array $premios Representará un array de premios
	*
	*/
    function actualizar_premios($id_ganadores, $premios){
        require('../models/conexion.php');

        for($i = 0;$i<count($id_ganadores);$i++){
            $ganadores = $id_ganadores[$i];
            $g_premios = $premios[$i];
           // echo $ganadores."<br>";
           // echo $g_premios."<br>";
            $update = "UPDATE rifa SET premio=? WHERE id=?";

		    $stmt = $conexion->prepare($update);

		    $stmt->bind_param('si', $g_premios,$ganadores);

		    if($stmt -> execute()){

                header('Location: ../index.php');

		      
		    }else{
		        
                header('Location: ../views/actualizar_premios.php');
		    }
        }
    }
     /**
	* Funcion que muestra los ganadores de la rifa
	*  
	* @return array $array_nombres Representará los nombres de una persona en la aplicación
	*
	*/
    function mostrar_ganadores(){
        require('../models/conexion.php');
        $sql = "select * from rifa";

    $result = $conexion->query($sql);

    $array_nombres = array();
    
    foreach ($result as $usuario): 
        array_push($array_nombres, $usuario);
    endforeach;
    return $array_nombres;

    }
}

?>