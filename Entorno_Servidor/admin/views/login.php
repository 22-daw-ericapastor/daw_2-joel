<!DOCTYPE html>
<html lang="es">
<?php
session_start();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">
<form id="waterform" method="post" action="../controllers/check_admin.php">

<div class="formgroup" id="name-form">
    <label for="name">Nombre de Usuario</label>
    <input type="text" name="nombre" required/>
</div>
<div class="formgroup" id="name-form">
    <label for="name">Contraseña</label>
    <input type="text" name="contrasena" required/>
</div>
<div class="formgroup">
    <input type="submit" value="Loguearse" />
</div>
<?php
print_r($_SESSION);
if(isset($_SESSION['nombre'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
	
</form>
</body>

</html>