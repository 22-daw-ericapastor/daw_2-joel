<?php

header('Content-type: text/html; charset=utf-8');
require('../controllers/listado_ganadores.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <style>
<!--PARA INCLUIR EL CSS-->
<?php
  include('../css/styles.css');

    ?>

    </style
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
            <form method="POST" action="../controllers/participantes.php">
    <div>
    <h1>Ganadores del Sorteo</h1>
<table class="table">
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
<button class="btn btn-primary mr-2" type="submit" name="enviar">Limpiar Sorteo</button>
</form>
            </div>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
