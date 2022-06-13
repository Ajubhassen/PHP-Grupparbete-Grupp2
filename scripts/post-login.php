<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
session_start();
if (!isset($_POST["email"]) && !isset($_POST["password"])) {
    die("Please enter valid information");
}
$db = new Database();
$success = false;
$user = $db->get_user_by_email($_POST["email"]);
if ($user) {
    $password = $_POST["password"];
    $success = $user->test_password($password);
    if ($success) {
        $_SESSION["user"] = $user;
        $_SESSION["logged_in"] = true;
        header("Location: /sites/E-commerce/pages/index.php");
    }else{
        http_response_code(400);
    }
} else {
    http_response_code(404);
}
