<?php 

if(isset($_SESSION['nombre'])){
// Nos conectamos a la base de datos

header('Content-type: text/html; charset=utf-8');
 
require('conexion.php');


// Establecemos el numero de pagina en la que el usuario se encuentra.
# Esto lo hacemos por el metodo GET, si no hay ningun valor entonces le asignamos la pagina 1.
$pagina_sin = isset($_GET['pagina_sin']) ? (int)$_GET['pagina_sin'] : 1;

// Establecemos cuantos post por pagina queremos cargar.
$postPorPagina = 5;

// Revisamos desde que usuario vamos a cargar, dependiendo de la pagina en la que se encuentre el usuario.
# Comprobamos si la pagina en la que esta es mayor a 1, sino entonces cargamos desde el usuario 0.
# Si la pagina es mayor a 1 entonces hacemos un calculo para saber desde que post cargaremos.
$inicio = ($pagina_sin > 1) ? ($pagina_sin * $postPorPagina - $postPorPagina) : 0 ;

// Preparamos y ejecutamos la consulta SQL
//Se obtienen los usuarios
$query = "SELECT * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
WHERE atendida = 0";
$result = $conexion->query($query);

// Calculamos el total de usuarios, para despues conocer el numero de paginas de la paginacion.
$totalArticulos = $result->num_rows;

$_SESSION['totalArticulos']=$totalArticulos;

if ($totalArticulos < 1){
	echo('Todos los mensajes están atendidos');
}

//Se obtienen los articulos para la página seleccionada
$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
	WHERE atendida = 0
	LIMIT $inicio, $postPorPagina
";
$result = $conexion->query($query);




// Calculamos el numero de paginas que tendra la paginacion.
# Para esto dividimos el total de usuarios entre los post por pagina
$numeroPaginas = ceil($totalArticulos / $postPorPagina);

}else{
	header('../views/login.php');
}

?>