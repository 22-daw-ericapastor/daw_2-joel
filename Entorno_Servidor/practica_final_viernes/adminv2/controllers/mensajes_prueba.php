<?php 

if(isset($_SESSION['nombre'])){
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
$query = "SELECT * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
WHERE atendida = 1
";
$result = $mysqli->query($query);



// Calculamos el total de usuarios, para despues conocer el numero de paginas de la paginacion.
$totalArticulos = $result->num_rows;	
$_SESSION['totalArticulos']=$totalArticulos;
if ($totalArticulos < 1){
	echo('No hay mensajes Atendidos');
}

//Se obtienen los articulos para la página seleccionada
$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM comentarios JOIN usuarios on comentarios.id_usuario=usuarios.id
	WHERE atendida = 1
	LIMIT $inicio, $postPorPagina
";
$result = $mysqli->query($query);




// Calculamos el numero de paginas que tendra la paginacion.
# Para esto dividimos el total de usuarios entre los post por pagina
$numeroPaginas = ceil($totalArticulos / $postPorPagina);

}else{
	header('../views/login.php');
}

?>