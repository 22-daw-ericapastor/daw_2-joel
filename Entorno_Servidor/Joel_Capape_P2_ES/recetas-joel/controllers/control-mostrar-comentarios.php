<?php

if(isset($_SESSION['nick'])){

    require('conexion.php');


	header('Content-type: text/html; charset=utf-8');

    $id_receta = $_SESSION['id_receta'];

 

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;


$postPorPagina = 2;


$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;


$query = "SELECT nombre_usuario,puntuacion,comentario_rec FROM comentarios_recetas WHERE id_receta='".$id_receta."'";
$result = $conexion->query($query);


$totalArticulos = $result->num_rows;

$_SESSION['totalArticulos'] = $totalArticulos;

if ($totalArticulos < 1){
	
}


$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM comentarios_recetas WHERE id_receta='".$id_receta."'
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);




$numeroPaginas = ceil($totalArticulos / $postPorPagina);


  
    

}else{
	header('Location: ../index.php');
}



?>