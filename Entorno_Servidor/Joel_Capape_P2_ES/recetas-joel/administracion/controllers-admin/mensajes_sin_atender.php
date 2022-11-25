<?php 

if(isset($_SESSION['nombre'])){
// Nos conectamos a la base de datos

header('Content-type: text/html; charset=utf-8');
 
require('conexion.php');



$pagina_sin = isset($_GET['pagina_sin']) ? (int)$_GET['pagina_sin'] : 1;


$postPorPagina = 5;

$inicio = ($pagina_sin > 1) ? ($pagina_sin * $postPorPagina - $postPorPagina) : 0 ;


$query = "SELECT * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
WHERE atendida = 0";
$result = $conexion->query($query);


$totalArticulos = $result->num_rows;

$_SESSION['totalArticulos']=$totalArticulos;

if ($totalArticulos < 1){
	echo('Todos los mensajes están atendidos');
}


$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
	WHERE atendida = 0
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);





$numeroPaginas = ceil($totalArticulos / $postPorPagina);

}else{
	header('../views/login.php');
}

?>