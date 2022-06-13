<?php 
session_start();
$is_admin = $_SESSION["user"]->get_user_type() == "admin";
if (!isset($_SESSION["user"]) || !isset($_SESSION["logged_in"]) || $is_admin == false){
    header("Location: /sites/E-commerce/pages/login.php");
}
