<?php
/*2.- Realizar una aplicación php que en base a un String predefinido, sustituya los caracteres por 
mayúsculas (sin utilizar las herramientas de php */

$cadena = "hola me llamo JOEL";
echo "La cadena original es: ".$cadena." </br>";
$resultado = "";
//recorremos la cadena y en la variable resultado vamos guardando en función de si son mayusculas y minusculasS
for($i=0;$i<strlen($cadena);$i++){
   $num = ord($cadena[$i]);
   if(97 <= $num && $num<=122){
       $ch = chr($num-32);
       $resultado.=$ch;
       //echo $ch;
   }else{
       $ch = $cadena[$i];
       $resultado.=$ch;
       //echo $ch;
   }
   
}
echo "La cadena transformada a mayuscula es: ".$resultado;


?>