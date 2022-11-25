<?php
class Actualizar{

    function actualizar_premios($id_ganadores, $premios){
        require('../models/conexion.php');

        for($i = 0;$i<count($id_ganadores);$i++){
            $ganadores = $id_ganadores[$i];
            $g_premios = $premios[$i];
            echo $ganadores."<br>";
            echo $g_premios."<br>";
            die();
            $update = "UPDATE rifa SET premio=? WHERE id=?";

		    $stmt = $conexion->prepare($update);

		    $stmt->bind_param('si', $g_premios,$ganadores);

		    if($stmt -> execute()){

                //header('Location: ../index.php');
                echo"Actualiza";
		      
		    }else{
		        
                header('Location: ../views/actualizar_premios.php');
		    }
        }
    }
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