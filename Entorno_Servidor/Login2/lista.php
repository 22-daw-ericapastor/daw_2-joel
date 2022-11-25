<?php

session_start();


$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "prueba";
$tbl_name = "usuario";


$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}




/*


$result = $conexion->query($sql);
$followingdata = $result->fetch_assoc();
        
$array = $followingdata;
$array_num = count($array);
for ($i = 0; $i < $array_num; ++$i){
    print $array[$i];
}
*/



$sql = "Select * From $tbl_name ";

$res=mysqli_query($conexion,$sql);






$i = 0;
while($result = mysqli_fetch_array($res)){
    echo $result[Nombre];
    echo $result[Contrasena];
    $lista[$i]=$result;
    echo "<br>";
    $i= $i + 1;
}

//echo "<br>";echo "<br>";echo "<br>";
//
//echo count($lista);
//$array_num = count($lista);
//for ($i = 0; $i < $array_num; ++$i){
//    echo $lista[$i]->Nombre;
//    echo $lista[Nombre];
//    echo $lista[Contrasena];
//}

$_SESSION['lista'] = $lista;


        
        
        
header("Location: listaUsuarios.php"); 
?>

