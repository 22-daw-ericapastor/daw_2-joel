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
    <input type="text" placeholder="Introduce el apellido2" name="apellido2">
</form>
</body>
</html>
<?php
if(isset($_POST["apellido2"])){
    $_SESSION['ape2'] = $_POST['apellido2'];
    header('Location: edad.php');
}
?>