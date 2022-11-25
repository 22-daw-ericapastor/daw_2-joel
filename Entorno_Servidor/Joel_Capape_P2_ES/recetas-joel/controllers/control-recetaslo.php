<?php


    require('conexion.php');


	header('Content-type: text/html; charset=utf-8');
 

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;


$postPorPagina = 6;


$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;


$query = "SELECT id, imagen, titulo, elaboracion, tipo_receta FROM recetas WHERE tipo_receta ='Receta Slow Cook'";
$result = $conexion->query($query);


$totalArticulos = $result->num_rows;

$_SESSION['totalArticulos'] = $totalArticulos;

if ($totalArticulos < 1){
	
}


$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM recetas WHERE tipo_receta ='Receta Slow Cook'
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);




$numeroPaginas = ceil($totalArticulos / $postPorPagina);


  



?>