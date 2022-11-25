<?php

header('Content-type: text/html; charset=utf-8');

echo"<h1> Platos del Hostal </h1>";
echo"<br><br>";




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






?>