<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Introduce tu Fruta</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" placeholder="Introduce la fruta" name="fruta">
</form>
</body>
</html>
<?php
if(isset($_POST['fruta'])){
    $_SESSION['frut'] = $_POST['fruta'];
}
?>