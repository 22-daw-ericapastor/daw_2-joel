<?php

include '../Modelo/empleados.php'; 


$trabajadores = $result->fetch_assoc();

include '../Vista/empleados.php';





?>