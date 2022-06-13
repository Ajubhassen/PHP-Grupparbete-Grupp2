<?php 
if (isset($_SESSION["user"]) && isset($_SESSION["logged_in"])) header("Location: /sites/E-commerce/pages/index.php");
require_once __DIR__ . "/../google/google-config.php";

if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $google_login_btn = '<a href="' . $google_client->createAuthUrl() . '">Login with Google</a>';
} else {
    header("Location: /sites/E-commerce/google/google-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Login</title>
</head>
<body>

<h2>Please Log in</h2>
<a href="/sites/E-commerce/pages/index.php">Home</a>
    <form action="/sites/E-commerce/scripts/post-login.php" method="post">
        <input type="email" name="email" placeholder="Email:">
        <input type="password" name="password" placeholder="Password:">
        <button type="submit">Log in</button>
    </form>
    <div class="container">
        <br />
        <h2 align="center">Login With Google</h2>
        <br />
        <div class="panel panel-default">
            <?php
            echo '<div align="center">' . $google_login_btn . '</div>';
            ?>
        </div>
    </div>
</body>
</html>