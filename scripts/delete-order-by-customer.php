<?php 
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/authorize.php';

if (!isset($_POST["email"])) die();
$db = new Database();
$success = $db->delete_order_by_email($_POST["email"]);
if ($success){
    http_response_code(200);
}else{
    http_response_code(500);
}