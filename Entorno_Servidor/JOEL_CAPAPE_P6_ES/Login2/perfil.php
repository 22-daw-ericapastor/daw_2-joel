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
				
				if (mensaje) {
					location.href="eliminar.php";
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
        
		if (!isset($_SESSION['username'])){
			header('Location: index.php');
		}
		
        ?>
        <?php
        require '../superCifrador.php';
        $cifrados = new Cifrados;
        $nombre_usuario = $cifrados->descrifra($_SESSION['username']);
        ?>
        
        <form action="Confirmar.php" method="post">
            <label>Nombre Usuario:</label><br>
            <input name="username" id="username" required="" type="text" value="<?php echo $nombre_usuario; ?>">                 
            <br><br>
            <label>Password:</label><br>
            <input name="password" id="password" required="" type="password">
            <br><br>
            <input name="Submit" value="Confirmar Contrasena" type="submit">
        </form>

        <?php
        if(isset($_SESSION['cambiar'])){
        ?>
         <form action="ActualizarPerfil.php" method="post">
            <input name="username" id="username" required="" type="text" value="<?php echo $nombre_usuario; ?>" style="display: none;">                 
            <br><br>
            <label>New Password:</label><br>
            <input name="password" id="password" required="" type="password">
            <br><br>
            <label>Repeat New Password:</label><br>
            <input name="password2" id="password" required="" type="password">
            <br><br>
            <input name="Submit" value="ACTUALIZAR" type="submit">
        </form>
        <?php
        }
        unset($_SESSION['cambiar']);
        ?>
        <?php
        if(isset($_SESSION['no_coincide'])){
            echo'<script>alert("La nueva contraseña no coincide")</script>';
            unset($_SESSION['no_coincide']);
        }
        if(isset($_SESSION['cont_no'])){
            echo'<script>alert("Contraseña Incorrecta")</script>';
            unset($_SESSION['cont_no']);
        }
        if(isset($_SESSION['actualizada'])){
            echo'<script>alert("Contraseña Cambiada")</script>';
            unset($_SESSION['actualizada']);
        }
        ?>
                
              
        
        <form onClick="ConfirmDemo()">
            <input type="submit" value="ELIMINAR PERFIL" />
        </form>
        <form action="cerrar_sesion.php" method="post">
            <input name="Submit" value="CERRAR SESION" type="submit">
        </form>
            

</body></html>