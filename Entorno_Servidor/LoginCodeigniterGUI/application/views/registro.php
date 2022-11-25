<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>


    </head>
    <body>

        <div id="container">
            <h1>Registro de Usuarios!</h1>

            <div id="body">
                <form action="<?php echo base_url()."index.php/User/registrar"; ?>" method="post">
                    <label>Nombre Usuario:</label><br>
                    <input name="username" id="username" required="" type="text">
                    <br><br>
                    <label>Password:</label><br>
                    <input name="password" id="password" required="" type="password">
                    <br><br>
                    <input name="Submit" value="LOGIN" type="submit">
                </form>
            </div>

            <br><br>
            <a href="<?php echo base_url()."index.php/User/registro"; ?>" class="view-all-button"> Registrar</a>
            <br>
            
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>

    </body>
</html>