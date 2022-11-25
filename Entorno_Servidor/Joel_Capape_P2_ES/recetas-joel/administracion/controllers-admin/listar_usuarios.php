<?php

if(isset($_SESSION['nombre'])){ 

	require('conexion.php');


	header('Content-type: text/html; charset=utf-8');
 

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;


$postPorPagina = 5;


$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;

// Preparamos y ejecutamos la consulta SQL
//Se obtienen los usuarios
$query = "SELECT * FROM  usuarios
";
$result = $conexion->query($query);


$totalArticulos = $result->num_rows;

$_SESSION['totalArticulos'] = $totalArticulos;

if ($totalArticulos < 1){
	
}


$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM usuarios
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);


$numeroPaginas = ceil($totalArticulos / $postPorPagina);



}else{
	header('Location: ../eli_usuario.php');
}

?>