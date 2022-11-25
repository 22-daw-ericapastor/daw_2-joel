<?php
/*1.- Realizar una aplicación php que en base a un String predefinido, elimine los espacios (sin 
utilizar las herramientas de php) */

$cadena = "Hola me llamo Joel";
echo "Cadena con espacios: ".$cadena." </br>";
echo "Cadena sin espacios: ";

//recorre la cadena y añadimos un if para comernos los espacios
for($i=0;$i<strlen($cadena);$i++){
    if($cadena[$i]==" "){
        
    }else{
        echo $cadena[$i];
    }
}




?>