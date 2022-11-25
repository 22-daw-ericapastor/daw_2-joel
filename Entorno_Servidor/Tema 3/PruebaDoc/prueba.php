<?php
include 'Persona.php';

$juan = new Persona('Juan','30');

$juan -> edad = 45;
echo $juan -> edad;
echo "<br>";
$juan -> saludar();
echo "<br>";
$juan -> setSexo("Hombre");
echo $juan -> getSexo(); 
echo "<br>"; 
?>