<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Nombres</th>
			<th>Apellido 1</th>
			<th>Apellido 2</th>
		</tr>
	</thead>
	<tbody>
	<?php
	/*4.- En base al fichero php, que contiene una lista de personas, introdúcelos en un Array y recórrelos 
	y muéstralos en una tabla de la siguiente manera: */

	/* Añadimos el archivo con un require

	Require -> hace lo mismo que el include con la diferencia de que si hay un error de codigo en el archivo nos dara un fatal error*/
                        require('nombres.php');
						/*recorremos los datos con un foreach y lo imprimos en una tabla, con esta forma de hacer el foreach dependemos 
						de que los archivos esten bien introducidos dentro del foreach
						*/
                        foreach ($datos as [$nombre, $apellido1, $apellido2]) {
                        ?>
                            <tr>
                            <td><?= $nombre ?></td>
                            <td><?= $apellido1 ?></td>
                             <td><?= $apellido2 ?></td>
                        	</tr>
                        <?php
                        }
                        ?>

	</tbody>
</table>

</body>
</html>