<?php
session_start();

if(isset($_POST['idreceta'])){

	$id_receta = $_POST['idreceta'];

	echo $id_receta;

    require('conexion.php');

	$sql = "SELECT recetas.id, recetas.titulo, recetas.tipo_receta, recetas.elaboracion, recetas.imagen
	from recetas
	 where recetas.id='".$id_receta."'";



	 $result = $conexion->query($sql);

     
	 if(mysqli_num_rows($result)>0){

        $resultados = $result->fetch_array();
   
         $consulta_ingredientes = "SELECT ingredientes.id_ingrediente, ingredientes.nombre_ingrediente, ingredientes.cantidad from recetas join ingredientes on recetas.id=ingredientes.id_receta where recetas.id=".$id_receta."";
   
         $resultado_ingredientes = $conexion->query($consulta_ingredientes);
   
   
   
         if(mysqli_num_rows($resultado_ingredientes)>0){
   
   
   
             while ($ingredientes = $resultado_ingredientes->fetch_array()) {
                 $numero_ingredientes[] = $ingredientes;
                 
                 
   
             }
   
   
             $_SESSION['nombre_ingredientes'] = $numero_ingredientes;

             $_SESSION['id_receta'] = $resultados['id'];
             $_SESSION['titulo'] = $resultados['titulo'];
             $_SESSION['nombre_ingrediente'] = $resultados['nombre_ingrediente'];
             $_SESSION['imagen'] = $resultados['imagen'];
             $_SESSION['tipo'] = $resultados['tipo_receta'];
             $_SESSION['elaboracion'] = $resultados['elaboracion'];


   
           header('Location: ../receta-info.php');
   
   
         }else{
   
             echo "La receta no tiene ingredientes";
         }
   
   
        }else{
   
   
            echo"No hay resultados";
   
   
        }


    

}else{
	echo"Introduce primero el nombre de la receta a modificar";
}



?>