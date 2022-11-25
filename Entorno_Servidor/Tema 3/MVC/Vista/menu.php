<?php

header('Content-type: text/html; charset=utf-8');

echo"<h1> Menú del día </h1>";
echo"<br><br>";

echo"<h2> Primeros </h2>";
echo $menu['Primero1'];
echo"<br>";
echo $menu['Primero2'];
echo"<br><br>";


echo"<h2> Segundos </h2>";
echo $menu['Segundo1'];
echo"<br>";
echo $menu['Segundo2'];
echo"<br>";


echo"<h2> Postres </h2>";
echo $menu['Postre1'];
echo"<br>";
echo $menu['Postre2'];
echo"<br>";

?>