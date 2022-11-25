<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CALCULADORA</title>
</head>
<body>
<form method="post" action="operador.php">
<input type="text" name="numero1"> 
<select name="opciones">
    <option value ="0">Sumar</option>
    <option value ="1">Restar</option>
    <option value ="2">Multiplicar</option>
    <option value ="3">Dividir</option>
</select>
<input type="text" name="numero2"> 
<input type="submit" name="calcular" value="Calcular"> 
</body>
</html>