<?php 


$hostname = 'localhost';
$database = 'Hostal';
$username = 'root';
$password = 'mysql';
$tbl_name = "Platos";

$mysqli = new mysqli($hostname,$username,$password,$database);
$query = "SELECT * FROM $tbl_name";
$result = $mysqli->query($query);

?>