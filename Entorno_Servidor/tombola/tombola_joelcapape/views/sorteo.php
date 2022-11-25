<?php

header('Content-type: text/html; charset=utf-8');
require '../controllers/sorteo.php';
    print_r($ganadores);

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
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
            <form method="POST" action="../controllers/participantes.php">
    <div>
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
    ?>
    </form>
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
     <button class="btn btn-danger mr-2" name="subir" type="hidden">Enviar Ganadores</button>
    
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