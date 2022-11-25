<?php

if(isset($_POST['calcular'])||isset($_POST['numero1'])||isset($_POST['numero2'])||isset($_POST['operador'])){
    if($numero1 = $_POST['numero1']==""||$numero2 = $_POST['numero2']==""||$operacion = $_POST['opciones']==""){
        echo("Rellene todos los campos");
        header('Location: index.php');
    }else{
        $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['opciones'];

    switch($operacion){
    case 0:
        $suma =$numero1+$numero2;
        echo("El resultado de sumar ".$numero1." + ".$numero2." es = ".$suma);
         break;
    case 1:
        $resta =$numero1-$numero2;
        echo("El resultado de restar ".$numero1." - ".$numero2." es = ".$resta);
         break;
    case 2:
        $multi =$numero1*$numero2;
        echo("El resultado de multiplicar ".$numero1." x ".$numero2." es = ".$multi);
         break;
    case 3:
        $division =$numero1/$numero2;
        echo("El resultado de dividir ".$numero1." / ".$numero2." es = ".$division);
        break;
    }
    }
    
}
?>