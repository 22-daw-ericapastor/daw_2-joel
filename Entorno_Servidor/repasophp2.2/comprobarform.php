<?php
if(isset($_POST['nombre'])||isset($_POST['apellido'])){
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];

echo('Los datos son'.$nombre.' '.$apellido);
}else{
    echo("INTRODUCE LOS DATOS");
    header('Location: formulario1repaso.php');
}
?>