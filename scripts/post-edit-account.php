<?php 
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";


$db = new Database();

$user = new User($_POST["name"], $_POST["email"], $_POST["user_type"], $_GET["id"]);
if ($_POST["address"]){
    $user->set_address($_POST["address"]);
}
if ($_POST["zip"]){
    $user->set_zip($_POST["zip"]);
}

$success = $db->update_user($user);

if ($success) header("Location: /sites/E-commerce/pages/index.php");
else echo "Error!";