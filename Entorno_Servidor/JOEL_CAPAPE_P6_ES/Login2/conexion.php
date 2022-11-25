<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "prueba";
$tbl_name = "usuario";
try {
    $dsn = "mysql:host=localhost;dbname=$db_name";
    $dbh = new PDO($dsn, $user_db, $pass_db);
   /* if($dbh){
        echo "Conexion verificada";
    }*/
} catch (PDOException $e){
    echo $e->getMessage();
}
?>