<?php 
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";

$db = new Database();
$product = new Product($_POST["title"], $_POST["price"], $_POST["description"], $_POST["size"], $_POST["article_number"], $_POST["quantity"]);
$product->update_last_edited();

$success = $db->add_product($product);
if ($success){
    header("Location: /sites/E-commerce/pages/all-products.php");
}else{
    echo "Error creating drink";
}