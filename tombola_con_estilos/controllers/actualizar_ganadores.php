<?php
if(isset($_POST['id_ganadores']) && isset($_POST['premios'])){

//include('../models/class/actualizar_premios.php');
print_r($_POST);
$id_ganadores = $_POST['id_ganadores'];
$premios = $_POST['premios'];
print_r($premios);
//$actualizar = new Actualizar;

//$actualizar ->actualizar_premios($id_ganadores, $premios);

}else{
	echo "HOLA";
}

?>