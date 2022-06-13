<?php 
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../scripts/authorize.php';
if (!isset($_GET["user_id"])&& !isset($_GET["order_date"])) die ("No parameters set");
$db = new Database();
$success = $db->complete_order($_GET["user_id"], $_GET["order_date"]);
if ($success){
    header("Location: /sites/E-commerce/pages/orders.php");
}else{
    echo "Something went wrong";
}
