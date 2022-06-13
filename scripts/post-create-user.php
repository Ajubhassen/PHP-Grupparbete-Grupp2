<?php 
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
session_start();
if (!isset($_POST["name"]) && !isset($_POST["email"]) && !isset($_POST["password"])){
    die ("Please enter valid information");
}
$db = new Database();
// body: name, email, password, "type" (standard = "user")
$user = new User($_POST["name"], $_POST["email"], isset($_POST["user_type"]) ? $_POST["user_type"] : "user");
$user->set_hash_password($_POST["password"]);
$success = $db->save_user($user);
if ($success) {
    $_SESSION["user"] = $user;
    $_SESSION["logged_in"] = true;
    http_response_code(201);
    header("Location: /sites/E-commerce/pages/index.php");

}else{
    http_response_code(500);
}


