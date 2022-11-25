<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio01 - Joel Capape</title>
    </head>
    <body>
        <p>
        <?php
        include('superCifrador.php');
        $prueba = new Cifrados;
        $contrasena = "Esto es una contrasena super segura 21";
        $cont_cifrada = $prueba->cifra($contrasena);
        //$pr = "eee";
        $cont_descifrada = $prueba->descrifra($cont_cifrada);
        $has1 = $prueba->hasea($contrasena);
        $has2 = $prueba->validahash($has1,$contrasena);
        /*
            --CIFRADO--
        
        */ 
        echo("<h2>CIFRADO DE CONTRASEÑAS</h2>");
        echo "<br>";
        echo("Contraseña a cifrar -> ".$contrasena);
        echo "<br>";
        echo("Contraseña cifrada (codificada en base 64) -> ".$cont_cifrada);
        echo "<br>";
        echo("Contraseña descifrada -> ".$cont_descifrada);
        echo "<br>";
        /*
        
            --HASH
        
        */
        
        echo("<h2>HASH DE CONTRASEÑAS</h2>");
        echo "<br>";
        echo("Contraseña para hacer hash -> ".$contrasena);
        echo "<br>";
        echo("Contrasena haseada (codificada en base 64) -> ".$has1);
        echo "<br>";
        echo("Verificado de la contrasena -> ".$has2);

        ?>
        </p>
    </body>
</html>