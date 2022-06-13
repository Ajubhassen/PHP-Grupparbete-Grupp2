<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../scripts/authorize.php';
if (!isset($_GET["id"])) die();
$db = new Database();
$success = $db->delete_product_by_id((int)$_GET["id"]);
if ($success) {
    header("Location /sites/E-commerce/pages/all-products.php");
}else{
    echo "Error";
}
