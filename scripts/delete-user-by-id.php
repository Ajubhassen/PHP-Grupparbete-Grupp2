<?php 
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/authorize.php';

if (!isset($_GET["id"])) die("no id set");
$db = new Database();
$success = $db->delete_user_by_id($_GET["email"]);
if ($success){
    http_response_code(200);
}else{
    http_response_code(500);
}