<?php 
session_start();
$_SESSION["user"] = null;
$_SESSION["logged_in"] = false;
session_destroy();
header("Location: /sites/E-commerce/pages/index.php");