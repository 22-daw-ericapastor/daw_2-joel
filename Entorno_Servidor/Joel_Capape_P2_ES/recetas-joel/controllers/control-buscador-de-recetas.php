<?php
session_start();
if(isset($_SESSION['recetas'])){
	unset($_SESSION['recetas']);
}
    require('conexion.php');


	header('Content-type: text/html; charset=utf-8');
 

$_SESSION['pagina'] = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;


$postPorPagina = 6;

$buscador = $_POST['buscador'] ;


$inicio = ($_SESSION['pagina'] > 1) ? ($_SESSION['pagina'] * $postPorPagina - $postPorPagina) : 0 ;



//PUEDO HACER UNAS CONSULTAS PREVIAS PARA VER SI EXISTE LO BUSCADO y SI EXISTE ENTONCES RELLENAR LOS ARRAYS
$query = "SELECT id, titulo, elaboracion, tipo_receta FROM recetas 
JOIN ingredientes ON recetas.id=ingredientes.id_receta
WHERE ingredientes.nombre_ingrediente='$buscador' 
GROUP BY ingredientes.id_receta";
$query2 = "SELECT id, titulo, elaboracion, tipo_receta FROM recetas 

WHERE recetas.titulo='$buscador'";

$result2 = $conexion->query($query2);

$result = $conexion->query($query);


while ($recetas = $result2->fetch_array()) {
	$numero[] = $recetas;
	$_SESSION['recetas'] = $numero;
	

}

while ($recetas = $result->fetch_array()) {
                 $numero[] = $recetas;
                 $_SESSION['recetas'] = $numero;
                 
                  
   
             }



// Calculamos el total de usuarios, para despues conocer el numero de paginas de la paginacion.
$totalArticulos = $result->num_rows;

$totalArticulos2 = $result2->num_rows;


	$resultados= $totalArticulos;
	$resultados2 = $totalArticulos2;

	$resultadoTotal = $resultados+$resultados2;

	$_SESSION['totalArticulos'] = $resultadoTotal;

	print_r($_SESSION['totalArticulos']);





if ($totalArticulos < 1){
	
}

//Se obtienen los articulos para la página seleccionada
$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM recetas 
	JOIN ingredientes ON recetas.id=ingredientes.id_receta
	WHERE ingredientes.nombre_ingrediente='$buscador'
	LIMIT $inicio, $postPorPagina
";
$query2 = "
	SELECT SQL_CALC_FOUND_ROWS * FROM recetas
	WHERE titulo ='$buscador'
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);
$result2 = $conexion->query($query2);





// Calculamos el numero de paginas que tendra la paginacion.
# Para esto dividimos el total de usuarios entre los post por pagina
$resultado_num_1 = ceil($totalArticulos / $postPorPagina);
$resultado_num_2 = ceil($totalArticulos2 / $postPorPagina);
$resultado_numeros_total = $resultado_num_1+$resultado_num_2;

$_SESSION['numeroPaginas'] = $resultado_numeros_total;

header('Location: ../buscador-de-recetas.php');

?>