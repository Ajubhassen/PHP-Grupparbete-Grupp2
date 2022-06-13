<?php 
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../scripts/authorize.php";

$db = new Database();
$i = $db->get_product_by_id($_GET["id"]);

$product = new Product($_POST["title"], $_POST["price"], $_POST["description"], $_POST["size"], $_POST["article_number"], $_POST["quantity"], $i->get("creation_date"), "", $i->get("id"));
$product->update_last_edited();
if (isset($_POST["image"])) $product->set_image($_POST["image"]);
$success = $db->update_product($product);
var_dump($product);

if ($success) header("Location: /sites/E-commerce/pages/all-products.php");
else echo "Error!";