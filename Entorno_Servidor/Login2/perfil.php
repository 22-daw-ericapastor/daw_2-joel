<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html><head>
        <meta charset="UTF-8">
        <title>Hostal de la tía Pepa</title>
        
        <script type="text/javascript">
            function ConfirmDemo() {
            //Ingresamos un mensaje a mostrar
            var mensaje = confirm("¿Desea Eliminar el perfil?");
            //Detectamos si el usuario acepto el mensaje
            location.href="eliminar.php";
            if (mensaje) {
            alert("¡Perfil eliminado!");
            }
            //Detectamos si el usuario denegó el mensaje
            else {
            alert("¡No se ha realizado ninguna acción!");
            }
            }
        </script>


    </head>
    <body>
        
        <h1> Perfil de Usuario</h1>
        
        <?php
        
        session_start();
       
        ?>
        
        <form action="ActualizarPerfil.php" method="post">
            <label>Nombre Usuario:</label><br>
            <input name="username" id="username" required="" type="text" value="<?php echo $_SESSION['username']; ?>">
            <br><br>
            <label>Password:</label><br>
            <input name="password"  required="" type="text" value="<?php echo $_SESSION['password']; ?>">
            <br><br>
            <input name="Submit" value="ACTUALIZAR" type="submit">
        </form>
                
              
        
        <form onClick="ConfirmDemo()">
            <input type="submit" value="ELIMINAR PERFIL" />
        </form>
        
        
            

</body></html>