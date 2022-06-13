<?php 
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/authorize.php';

if (!isset($_GET["id"])) die("No id set");
$db = new Database();
$success = $db->delete_order_by_id($_GET["id"]);
if ($success){
    http_response_code(200);
    header("Location: /sites/E-commerce/pages/orders.php");
}else{
    http_response_code(500);
}