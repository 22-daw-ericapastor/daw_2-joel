<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Introduce tu edad</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" placeholder="Introduce la edad" name="edad">
</form>
</body>
</html>
<?php
if(isset($_POST["edad"])){
    $_SESSION['edd'] = $_POST['edad'];
    header('Location: fruta.php');
}
?>