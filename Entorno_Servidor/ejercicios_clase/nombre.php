<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Introduce tu nombre</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" placeholder="Introduce el nombre" name="nombre">
</form>
</body>
</html>
<?php
if(isset($_POST["nombre"])){
    $_SESSION['nom'] = $_POST['nombre'];
    header('Location: apellido.php');
}
?>