<?php 
session_start();
$_SESSION["cart"] = null;
session_destroy();
header("Location: /sites/E-commerce/pages/cart.php");