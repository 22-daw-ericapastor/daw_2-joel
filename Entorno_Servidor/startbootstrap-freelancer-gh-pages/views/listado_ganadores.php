<?php

header('Content-type: text/html; charset=utf-8');
require('../controllers/listado_ganadores.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>MVC</title>
</head>
<body>
<h1>Ganadores del Sorteo</h1>
<table>
    <thead>
        <tr>
            <td>Nombre</td>
            <td>Apellido 1</td>
            <td>Apellido 2</td>
            <td>Premio</td>
        </tr>
    </thead>
    <tbody>
            <?php
            for($i = 0;$i<count($listado_ganadores);$i++){
                if($listado_ganadores[$i]['premio'] == ''){

                }else{

            ?>
            <tr>
            <td><?php echo $listado_ganadores[$i]['nombre']; ?></td>
            <td><?php echo $listado_ganadores[$i]['apellido1']; ?></td>
            <td><?php echo $listado_ganadores[$i]['apellido2']; ?></td>
            <td><?php echo $listado_ganadores[$i]['premio']; ?></td>
            </tr>
            <?php
                }
            }
            ?>
    </tbody>
</table>
<form method="POST" action="../controllers/limpiar_sorteo.php">
<input type="submit" name="enviar" value="Limpiar Sorteo">
</form>
</body>
</html>