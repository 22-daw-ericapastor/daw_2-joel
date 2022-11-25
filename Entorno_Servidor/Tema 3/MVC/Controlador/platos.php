<?php

include '../Modelo/platos.php'; 


$platos = $result->fetch_assoc();

include '../Vista/platos.php';





?>