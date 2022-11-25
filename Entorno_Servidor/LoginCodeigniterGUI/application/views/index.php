<!doctype html>
<html>
    <head>
        <meta charset="uft-8"/>
        <title>Hola Mundo en HTML</title>
    </head>
    <body>
        <h1>Perfil</h1>


        <?php
        if (!$this->session->userdata('isLoggedIn')) {
            echo"logueado";
            redirect('welcome/index');
        }
        ?>



        <form action="<?php echo base_url()."index.php/User/modificar"; ?>" method="post">
            <?php echo "id => "; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input name="id" id="id" required="" type="text" value="<?php echo $this->session->userdata('id'); ?>">
            <br>
            <?php echo "Nombre => "; ?> &nbsp&nbsp&nbsp&nbsp&nbsp<input name="nombre" id="nombre" required="" type="text" value="<?php echo $this->session->userdata('usuario'); ?>">
            <br>
            <?php echo "Contraseña => "; ?><input name="contrasena" id="contrasena" required="" type="text" value="<?php echo $this->session->userdata('contrasena'); ?>">
            <br>
            <input type="submit" name="update" value="Update" >
            <input type="submit" name="delete" value="Delete" >
            <input type="submit" name="cerrar" value="Cerrar Sesión" >
        </form>


        
        
        
    </body>
</html>








