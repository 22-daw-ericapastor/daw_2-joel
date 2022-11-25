<?php

include '../models/class/realizar_sorteo.php'; 

$sorteo = new Sorteo;
$ganadores = $sorteo->realizar_sorteo();

//include '../views/sorteo.php';





?>