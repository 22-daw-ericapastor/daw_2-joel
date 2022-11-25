<?php
session_start();
if(isset($_SESSION['nombre'])){

    if(isset($_POST['titulo']) && isset($_POST['opciones']) && isset($_POST['ingredientes']) && isset($_POST['cantidad']) && isset($_POST['elaboracion']) && isset($_FILES['archivo']['name'])){


        $titulo_receta = $_POST['titulo'];
        $ingredientes = $_POST['ingredientes'];
        $cantidad = $_POST['cantidad'];
        $elaboracion = $_POST['elaboracion'];    
        $archivo = $_FILES['archivo']['name'];
       $tipo = $_FILES['archivo']['type'];
       $image = $_FILES['archivo']['tmp_name'];
       $tipo_receta = $_POST['opciones'];
       $imgContenido = addslashes(file_get_contents($image));


        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }else{


        if($tipo_receta == "Selecciona una opción"){
            echo "No has elegido una opción";
        }else{


        


        require('conexion.php');

        $sql = "SELECT * FROM recetas WHERE titulo = '$titulo_receta'";

        $result = $conexion->query($sql);


            // Validamos si hay resultados
            if(mysqli_num_rows($result)==1)
            {
                // Si es mayor a cero imprimimos que ya existe el usuario
                //echo "Ya existe la receta que vamos a introducir";
                $_SESSION['existe_receta'] = 1;
                header('Location: ../crear_receta.php');
            }
            else
            {
            // Si no hay resultados, ingresamos el registro a la base de datos
                    $stmt = $conexion->prepare("INSERT INTO recetas (imagen, titulo, elaboracion, tipo_receta) VALUES (?, ?, ?, ?)");
                    $null = NULL;
                    $stmt->bind_param("bsss", $null, $titulo_receta, $elaboracion, $tipo_receta);
                    $fp = fopen($_FILES['archivo']['tmp_name'], "r");
                    while (!feof($fp)) {
                        $stmt->send_long_data(0, fread($fp, 8192));
                    }
                    fclose($fp);
                    if($stmt->execute()){
                        
                    }else{
                        echo"NO se ha insertado";
                    }

            // Establecer parámetros y ejecutar
           
            $ultimo_id = mysqli_insert_id($conexion);

            for($i=0;$i< count($ingredientes);$i++){
                $ingrediente = strtoupper($ingredientes[$i]);
                $cantidades = strtoupper($cantidad[$i]);

                $sql = "SELECT * FROM ingredientes join recetas on recetas.id=ingredientes.id_receta
                 WHERE nombre_ingrediente = '$ingrediente' and id_receta=".$ultimo_id."";

                $result = $conexion->query($sql);

                if(mysqli_num_rows($result)==1){

                    
                }else{

                $stmt = $conexion->prepare("INSERT INTO ingredientes (nombre_ingrediente, cantidad, id_receta) VALUES (?, ?, ?)");
                $stmt->bind_param('ssi', $ingrediente, $cantidades, $ultimo_id);

                if($stmt->execute()){
                       $_SESSION['insertado_receta'] = 1;
                        header('Location: ../crear_receta.php');
                    }else{
                        echo"NO se ha insertado";
                    }
                }

            }



     }

        


}
            }







        


    }
    else{
        echo("Algún campo del formulario sin rellenar");
    }



}else{
    header('Location: views-admin/login-admin.php');
}

?>