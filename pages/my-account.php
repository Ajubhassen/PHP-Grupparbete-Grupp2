<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
session_start();
if (!isset($_SESSION["user"]) || !isset($_SESSION["logged_in"])) die("No user");

$db = new Database();

$user = $db->get_user_by_email($_SESSION["user"]->get_email());
$address = $user->get_address();
$zip = $user->get_zip();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sites/E-commerce/assets/style.css">
    <title>Edit user</title>
</head>

<body>
<?php require_once __DIR__ . "/../components/navbar.php" ?>
    <h2>Edit user: <?= $user->get_email()?></h2>
    <form action="/sites/E-commerce/scripts/post-edit-account.php?id=<?=$user->get_id()?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $user->get_name() ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $user->get_email() ?>">
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $address ?>">
        <label for="zip">Zip:</label>
        <input type="text" name="zip" value="<?= $zip ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>