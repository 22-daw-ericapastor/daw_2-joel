<?php

header('Content-type: text/html; charset=utf-8');
require '../controllers/sorteo.php';
    print_r($ganadores);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>MVC</title>
</head>
<body>
<h1>Ganadores del Sorteo</h1>
<?php

    if(isset($ganadores[0])){ 
    ?>
    <p>Y vaya Jamón que se lleva, <?php echo $ganadores[0]['nombre'];  ?></p>
    <?php
    }
    ?>
    <?php
    if(isset($ganadores[1])){ 
    ?>
    <p>Qué bonito alboroto, <?php echo $ganadores[1]['nombre']; ?> te ha tocado el perrito piloto.</p>
    <?php
    }
    ?>
    <?php
    if(isset($ganadores[2])){ 
    ?>
    <p>Qué bonito, que alboroto, <?php echo $ganadores[2]['nombre']; ?> vino andando y se va en minimoto</p>
    <?php
    }
    ?>
    <?php
    if(isset($ganadores[3])){ 
    ?>
   <p>Guay guay guay, a <?php echo $ganadores[3]['nombre']; ?> le ha tocado una Mountain Bike</p>
    <?php
    }
    ?>
    <?php
    if(isset($ganadores[4])){ 
    ?>
    <p><?php echo $ganadores[4]['nombre']; ?> siempre toca, siempre toca, si no es un pito es una pelota.</p>
    <?php
    }
    ?>
    <?php
    if(isset($ganadores[5])){ 
    ?>
     <p>Y para <?php echo $ganadores[5]['nombre']; ?> la chochona, la muñeca chochona del verano, que bonita la chochona</p>
    <?php
    }

    for($i=0;$i<count($ganadores);$i++){
        //crear el array de premios y los inputs en hidden 
        print_r($ganadores[$i]['id']);
    }
    ?>
    <form method="POST" action="../controllers/actualizar_ganadores.php">
        <?php
        $premios = ["Jamón","Perro Piloto", "Minimoto", "Bicicleta", "Pelota", "Muñeca"];
        for($i=0;$i<count($ganadores);$i++){
        ?>
        <input type="hidden" name="id_ganadores[]" class="form-control" value="<?php echo $ganadores[$i]['id']; ?>">
        <input type="hidden" name="premios[]" class="form-control" value="<?php echo $premios[$i]; ?>">
        <?php 
    }
        ?>
    <input type="submit" value="Enviar Ganadores">
    </form>
</body>
</html>