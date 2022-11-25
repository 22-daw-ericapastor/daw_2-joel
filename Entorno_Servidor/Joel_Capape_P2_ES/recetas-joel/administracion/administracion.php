<?php
session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: views-admin/login-admin.php');
    session_destroy();
    
}
if(isset($_SESSION['nombre'])){
    include('views-admin/header-admin.php');
    include('views-admin/body-admin.php');
}
?>