<?php
session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: views/login.php');
    session_destroy();
    
}
if(isset($_SESSION['nombre'])){
    include('views/header.php');
    include('views/body.php');
}
?>