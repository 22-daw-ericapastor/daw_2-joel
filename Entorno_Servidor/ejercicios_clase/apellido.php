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
    <input type="text" placeholder="Introduce el apellido" name="apellido">
</form>
</body>
</html>
<?php
if(isset($_POST["apellido"])){
    $_SESSION['ape'] = $_POST['apellido'];
    header('Location: apellido2.php');
}
?>