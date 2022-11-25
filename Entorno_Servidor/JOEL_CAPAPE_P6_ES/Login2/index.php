<!DOCTYPE html>

<html><head>
        <meta charset="UTF-8">
        <title>Hostal de la tía Pepa</title>
    </head>
    <body>
        
        <h1> Hostal de la tía Pepa</h1>
        
        <?php
        
        session_start();
        
        if (isset($_SESSION['username'])){ 
            require '../superCifrador.php';
            $cifrado = new Cifrados;
            $nombre = $cifrado->descrifra($_SESSION['username']);
            echo "Bienvenido! " . $nombre;
            echo "<br>";echo "<br>";
            ?>
        
        <a href=<?php echo"perfil.php"?> >Accede al perfil</a>;
        <br>
        <br>
        
        <a href=<?php echo"lista.php"?> >Lista de Usuarios</a>;
        
        
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
        <?php
        if(isset($_SESSION['nombre'])){
            echo'<script>alert("Usuario registrado con éxito")</script>';
            unset($_SESSION['nombre']);
        }
        if(isset($_SESSION['error'])){
            echo'<script>alert("Error en la contraseña o el usuario")</script>';
            unset($_SESSION['error']);
        }


        ?>
        <a href=<?php echo"registro.php"?> >Accede al registro</a>
        <?php   
        }
        ?>
        
            
        
            
            

</body></html>