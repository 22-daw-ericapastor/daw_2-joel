<?php 

// Nos conectamos a la base de datos

header('Content-type: text/html; charset=utf-8');
 
$hostname = 'localhost';
$database = 'practica';
$username = 'root';
$password = '';
$tbl_name = "comentarios";


$mysqli = new mysqli($hostname,$username,$password,$database);


// Establecemos el numero de pagina en la que el usuario se encuentra.
# Esto lo hacemos por el metodo GET, si no hay ningun valor entonces le asignamos la pagina 1.
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Establecemos cuantos post por pagina queremos cargar.
$postPorPagina = 5;

// Revisamos desde que usuario vamos a cargar, dependiendo de la pagina en la que se encuentre el usuario.
# Comprobamos si la pagina en la que esta es mayor a 1, sino entonces cargamos desde el usuario 0.
# Si la pagina es mayor a 1 entonces hacemos un calculo para saber desde que post cargaremos.
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;

// Preparamos y ejecutamos la consulta SQL
//Se obtienen los usuarios
$query = "SELECT * FROM $tbl_name";
$result = $mysqli->query($query);

// Calculamos el total de usuarios, para despues conocer el numero de paginas de la paginacion.
$totalArticulos = $result->num_rows;	

if ($totalArticulos < 1){
	header('Location: http://www.google.es/');
}

//Se obtienen los articulos para la página seleccionada
$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM $tbl_name
	LIMIT $inicio, $postPorPagina
";
$result = $mysqli->query($query);




// Calculamos el numero de paginas que tendra la paginacion.
# Para esto dividimos el total de usuarios entre los post por pagina
$numeroPaginas = ceil($totalArticulos / $postPorPagina);

require 'index.view.php';

?>