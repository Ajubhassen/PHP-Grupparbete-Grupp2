<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../scripts/authorize.php';

if (!isset($_GET["title"], $_GET["price"], $_GET["description"], $_GET["size"], $_GET["quantity"])) die("Fill in all values");
$product = new Product($_GET["title"], $_GET["price"], $_GET["description"], $_GET["size"], $_GET["article_number"], $_GET["quantity"]);
if (isset($_GET["image"])){
    $product->set_image($_GET["image"]);
}
var_dump($product);
$db = new Database();
$success = $db->add_product($product);
if ($success){
    http_response_code(201);
}else{
    http_response_code(500);
}