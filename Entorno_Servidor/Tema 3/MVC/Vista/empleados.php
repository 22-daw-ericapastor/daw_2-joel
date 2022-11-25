<?php

header('Content-type: text/html; charset=utf-8');

echo"<h1> Empleados del Hostal </h1>";
echo"<br><br>";




foreach ($result as $usuario):
	echo"<br>"; 
	echo "Nombre: ".$usuario["Nombre"];
	echo"<br>";
	echo "Edad: ".$usuario["Edad"];
	echo"<br>";
	echo "Puesto: ".$usuario["Puesto"];
	echo"<br>";
	echo "Descripción: ".$usuario["Descripcion"];
	
	echo"<br><br>";
	echo"<br><br>";
endforeach;


/*
echo'<table border="1">
        <tr>
            <td><strong>Nombre </strong></td>
            <td><strong>Precio</strong></td>
			<td><strong>Descripción</strong></td>
        </tr>';

                    
						foreach ($result as $usuario): 
							echo"<tr>";
							echo "<td>".$usuario["Nombre"]."</td>";
							echo "<td>".$usuario["Precio"]."</td>";
							echo "<td>".$usuario["Descripcion"]."</td>";
							echo"</tr>";
						endforeach;
				
				
                        
                    echo"
    </table>";




*/

?>