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
        <style type="text/css"><?php include('../css/styles.css');?></style>


<!--PARA INCLUIR EL CSS-->
    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img class="masthead-avatar mb-1" src="../assets/img/bingo.png" width="90" heidth="99" alt="..." /></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../index.php">Inicio</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
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
<!--<form method="POST" action="../controllers/limpiar_sorteo.php">
<button class="btn btn-primary mr-2" type="submit" name="enviar">Limpiar Sorteo</button>
</form>-->
<form method="POST" action="../controllers/limpiar_sorteo.php">
<button class="btn btn-info mr-2" type="submit" name="enviar">Limpiar Sorteo</button>
</form>
            </div>
            <header>
    </body>
</html>
