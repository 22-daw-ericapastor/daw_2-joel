
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <form method="post" action="">
        <input type="text" name="operando1">
        <select name="operador">
            <option value="+">+
            </option>
            <option value="-">-
            </option>
            <option value="*">*
            </option>
            <option value="/">/
            </option>
            <option value="√"> √</option>
            <option value="^"> ^</option>
        </select>
        <input type="text" name="operando2">
        <input type="submit" value="enviar">
    </form>
</body>
</html>


<?php
if(isset($_POST['operando1']) || isset($_POST['operando2']) || isset($_POST['operador'])){
   $operando1 = $_POST['operando1'];
    $operando2 = $_POST['operando2'];
    $operador = $_POST['operador'];
    //print_r($_POST);
    $dife = new Calculadora;
    $dife->operador($operando1,$operando2,$operador);

}

class Calculadora {
    
    public $diferencia;

    function operador($operando1,$operando2,$operador) {

        switch ($operador) {
    case '-':
        $this->diferencia=$operando1-$operando2;
        echo"La resta de ".$operando1."-".$operando2." es => ". $this->diferencia,"<br>";
        break;
    case '+':
        $this->diferencia=$operando1+$operando2;
        echo"La resta de ".$operando1."+".$operando2." es => ". $this->diferencia,"<br>";
        break;
    case '*':
        $this->diferencia=$operando1*$operando2;
        echo"La multiplicacion de ".$operando1."x".$operando2." es => ". $this->diferencia,"<br>";
        break;
    case '/':
        $this->diferencia=$operando1/$operando2;
        echo"La division de ".$operando1."/".$operando2." es => ". $this->diferencia,"<br>";
        break;
    case '√':
    //aunque operando 2 tenga dato no se usa 
        $this->diferencia=sqrt($operando1);
        echo"La raiz cuadrada de ".$operando1." es => ". $this->diferencia,"<br>";
        break;
    case '^':
        $this->diferencia= pow($operando1,$operando2);
        echo"La potencia de ".$operando1." es => ". $this->diferencia,"<br>";
        break;
}

    }


    }

    

    ?>
