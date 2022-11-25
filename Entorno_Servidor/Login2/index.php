<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html><head>
        <meta charset="UTF-8">
        <title>Hostal de la tía Pepa</title>
    </head>
    <body>
        
        <h1> Hostal de la tía Pepa</h1>
        
        <?php
        
        session_start();
        
        if (isset($_SESSION['username'])){ 
            echo "Bienvenido! " . $_SESSION['username'];
            echo "<br>";echo "<br>";
            ?>
        
        <a href=<?php echo"perfil.php"?> >Accede al perfil</a>;
        <br>
        <br>
        
        <a href=<?php echo"lista.php"?> >Lista de Usuarios</a>;
        
        <form action="Cerrar.php">
            <input type="submit" value="CERRAR SESION" />
        </form>
        
            <?php
        }else{ ?>    
        
        <form action="checklogin.php" method="post">
            <label>Nombre Usuario:</label><br>
            <input name="username" id="username" required="" type="text">
            <br><br>
            <label>Password:</label><br>
            <input name="password" id="password" required="" type="password">
            <br><br>
            <input name="Submit" value="LOGIN" type="submit">
        </form>
        
        <a href=<?php echo"registro.php"?> >Accede al registro</a>
        <?php   
        }
        ?>
        
            
        
            
            

</body></html>