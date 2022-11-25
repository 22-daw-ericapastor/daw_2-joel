<?php
include('../models/class/actualizar_premios.php');

$actualizar = new Actualizar;

$listado_ganadores = $actualizar ->mostrar_ganadores();
?>