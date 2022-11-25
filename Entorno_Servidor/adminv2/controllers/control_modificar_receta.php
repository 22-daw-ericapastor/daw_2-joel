<?php
session_start();
if($_SESSION['nombre']){


if(isset($_POST['subir'])){

		$id_receta = $_SESSION['id_receta'];
		$titulo_receta = strtoupper($_POST['titulo']);
        $ingredientes = $_POST['ingredientes'];
        $cantidad = $_POST['cantidad'];
        $elaboracion = $_POST['elaboracion'];
		$id_ingredientes = $_POST['id_ingrediente'];
        $archivo = $_FILES['archivo']['name'];
       $tipo = $_FILES['archivo']['type'];
       $image = $_FILES['archivo']['tmp_name'];
       $tipo_receta = $_POST['opciones'];

       require('conexion.php');


       	//si no se sube una imagen SOLO hacer update de los otros parametros

       	$sql ="SELECT imagen.titulo from imagen where id='".$id_receta."'"; 

       	$result = $conexion->query($sql);

	 		$update = "UPDATE imagen SET imagen.titulo=?, imagen.tipo_receta=?, imagen.elaboracion=? WHERE id=?";

		    $stmt = $conexion->prepare($update);

		    $stmt->bind_param('sssi', $titulo_receta, $tipo_receta, $elaboracion, $id_receta);

		    if($stmt -> execute()){
		      
		    }else{
		        echo("Ha ocurrido un error en el actualizar");
		    }



			for($i=0;$i< count($ingredientes);$i++){
				$ingrediente = strtoupper($ingredientes[$i]);
				$cantidades = $cantidad[$i];
				$id_ingrediente= $id_ingredientes[$i];
			
				$stmt = $conexion->prepare("UPDATE ingredientes SET nombre_ingrediente=?, cantidad=? WHERE id_ingrediente=?");
				$stmt->bind_param('sii', $ingrediente, $cantidades, $id_ingrediente);


				
				if($stmt->execute()){
					   $_SESSION['receta_modificada'] = 1;
						header('Location: ../modificar_receta.php');
					}else{
						echo"NO se ha insertado";
					}
				
	
			}
	 	


	 	if($archivo){

	 		 $imgContenido = addslashes(file_get_contents($image));

	 		    print_r($imgContenido);

	 		$stmt = $conexion->prepare("UPDATE imagen SET imagen=? WHERE id=?");
                    $null = NULL;
                    $stmt->bind_param("bi", $null,$id_receta);
                    $fp = fopen($_FILES['archivo']['tmp_name'], "r");
                    while (!feof($fp)) {
                        $stmt->send_long_data(0, fread($fp, 8192));
                    }
                    fclose($fp);
                    if($stmt->execute()){
                        
                    }else{
                        echo("Ha ocurrido un error en el actualizar");
                    }




	 	}else{
	 	
	 	}



	 			

	 			
	 		



       		

       		//si se sube una imagen hacer un update de SOLO la imagen y todo lo demas



       


       




}else{
	echo"Introduce primero el nombre de la receta a modificar";
}





}else{
	echo"No existe la sesion";
}
?>