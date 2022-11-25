
<?php 
/*Implementar un programa que sume los dígitos de un número entero no negativo. Por 
ejemplo, la suma de los dígitos del 3433 es 13.*/
$numero = 5279;

//controlamos que el numero no es negativo y después con un for vamos separando el numero en digitos y despues sumamos dichos digitos
if($numero <0){
    echo("El número es negativo");
}else{
    $numero_ini = $numero;
    $suma=0;
    $reesto=0;
    for($i=0;$i<=$numero;$i++){
    $resto=$numero%10;
    $suma=$suma+$resto;
    $numero=$numero/10;
    }
    echo "La suma de ".$numero_ini." es: ".$suma;

}

?>