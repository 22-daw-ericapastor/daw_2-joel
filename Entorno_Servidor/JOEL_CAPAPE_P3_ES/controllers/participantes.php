<?php
if(isset($_POST['nombre']) && isset($_POST['apellido1'])&& isset($_POST['apellido2'])){
    if($_POST['nombre'] != '' && $_POST['apellido1'] != '' && $_POST['apellido2'] != ''){
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    include('../models/class/introducir_participantes.php');

    $participantes = new Participantes;
    $participantes ->introducir_participantes($nombre, $apellido1,$apellido2);



    }else{
        header('Location: ../index.php'); 
    }
}else{
    header('Location: ../index.php');
}
?>