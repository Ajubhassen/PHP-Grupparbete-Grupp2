<?php 
require_once __DIR__."/../classes/Order.php";
require_once __DIR__."/../classes/Database.php";
require_once __DIR__."/../classes/User.php";
require_once __DIR__."/../classes/Cart.php";
require_once __DIR__ . "/authorize.php";

$db = new Database();
$user = $_SESSION["user"];
$user->set_address($_POST["address"]);
$user->set_zip($_POST["zip"]);
$success = false;
if (!isset($_SESSION["cart"])) die("No item in cart");
for ($i=0; $i < count($_SESSION["cart"]); $i++) { 
    $success = $db->new_order(new Order($user->get_id(), $_SESSION["cart"][$i]->get_id(), $_SESSION["cart"][$i]->get_quantity()), $user);
}

$db->update_user_location($user);

if ($success) header("Location: /sites/E-commerce/pages/thank_you_page.php");
