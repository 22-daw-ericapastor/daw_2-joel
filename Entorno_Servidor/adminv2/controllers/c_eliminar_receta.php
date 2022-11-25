<?php
session_start();
if(isset($_SESSION['nombre'])){

    if(isset($_POST['idreceta'])){

        $id_receta = $_POST['idreceta'];

        require('conexion.php');

            
        $stmt = $conexion->prepare("DELETE FROM ingredientes WHERE id_receta = ?");
        $stmt->bind_param('i', $id_receta);

            if($stmt->execute()){

                }else{
                   
                }
            

        

        $stmt = $conexion->prepare("DELETE FROM imagen WHERE id = ?");
        $stmt->bind_param('i', $id_receta);
 

if ($stmt->execute()) {
      //echo "Perfil eliminado";
	$_SESSION['receta_eliminada'] = 1;
	header('Location: ../eliminar_receta.php');

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);

}

    }

    



}else{
    header('Location: ../views/login.php');
}
?>