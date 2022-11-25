<?php
session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: views/login.php');
}
if(isset($_SESSION['nombre'])){
    include('views/header.php');
    include("views/nav.php");

// Contenido

    include('views/body.php');
}
?>